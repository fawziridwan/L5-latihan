<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use App\Image;
use Session;
use File;
use App\Http\Requests\ArticleRequest;
use Alert;

class ArticlesController extends Controller
{ 
    // public function __construct() {
    //     $this->middleware('sentinel');
    //     $this->middleware('sentinel.role');
    // }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $articles = Article::paginate(3);
        return view('articles.index')->with('articles',$articles);
    }

    /**
     * tampil the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $create = true;        
        return view('articles.create')->with('create',$create);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::find($id);
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');
        $photos = Article::find($id)->photos->sortBy('Image.id');
        $a =0;
        $b = 0;
        return view('articles.show')
        ->with('articles', $articles) 
        ->with('comments', $comments) 
        ->with('photos', $photos)
        ->with('a', $a)
        ->with('b', $b);
    }

    /**
     * tampil the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        $create = false;        
        return view('articles.edit',compact('articles','create'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $articles = Article::find($id)->update($request->all());

        if ($articles) {
            Alert::success('Article success updated');
            return redirect()->route("articles.show",$id);
        } else {
            Alert::error('Article fail updated');
            return redirect()->route("articles.show",$id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        /*$articles = Article::create($request->all());
        if ($articles) {
            foreach ($request->image as $photo) {
                $rename = "img_".str_random(6).$photo->extension();
                $image = $photo->storeAs('public/image', $rename);

                Image::create([
                    'article_id' => $articles->id,
                    'image' => $rename
                ]);
            }
            return redirect()->route("articles.index");                    
        } else {
            return redirect()->route("articles.index");        
        }
        return 'Upload successful!';
        */
        $articles = Article::create($request->all());
        $destination_path = "uploads/";
        foreach ($request->image as $image) {
            $name = str_random(6).'_'.$image->getClientOriginalName();
            $image->move($destination_path,$name);
             Image::create([
                 'article_id' => $articles->id,
                 'image' => $destination_path.$name
             ]);
        }
        if ($articles) {
            Alert::success('Articles success Added');
            return redirect()->route('articles.index');
        } else {
            Alert::error('Articles fail to added');        
            return redirect()->route('articles.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $img_file = Image::where('article_id',$id)->get();
            if ($img_file != null) {
                foreach ($img_file as $img) {
                    File::delete($img->image);
                }
                Image::where('article_id',$id)->delete();
            }
            Article::destroy($id);
            Alert::success('Delete file successfull'); 
            return redirect()->route('articles.index');            
        } 
        catch (Exception $e) {
            Alert::error('Whoops something went wrong, failed to delete!!'); 
            return redirect()->route('articles.index');                        
        }
    }

    public function showImage($id)   
    {
        $img = Image::find($id);
        return view('articles.show_image')->with('img',$img);        
    }

    public function updateImage(Request $request, $id)    {
        $img = Image::find($id);
        File::delete($img->image);
        $dest_path = "uploads/";
        $name = str_random(6).'_'.$request->image->getClientOriginalName();
        $request->image->move($dest_path, $name);
        $update = Image::find($id)->update([
            'image'=>$dest_path.$name
        ]);
        if ($update){
            // Session::flash("notice_update_img", "image success updated");
            Alert::success('image success updated');
            return redirect()->route("articles.show", $img->article_id);
        } else {
            // Session::flash("error", "image fails updated");
            Alert::error('image fails updated');
            return redirect()->route("articles.show", $img->article_id);
        }    
    }

    public function deleteImage($id)    {
        $img_file = Image::find($id);

        try {
            File::delete($img_file->image); //deleting old image            
            Image::destroy($id);
            // Session::flash("notice_delete_img","image");
            Alert::success('Image delete successful');
            return redirect()->route('articles.show',$img_file->article_id);
        } catch (Exception $e) {
            return redirect()->route('articles.show',$img_file->article_id);            
        }
    }
}
    