<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment; 
use App\Article;
use Validator;
use Session;
use Alert;
use DB;
use Datatables;

class CommentsController extends Controller
{
    /*
    Display Construct for check status user login
    */    
    public function __construct() {
        $this->middleware('sentinel');
        $this->middleware('sentinel.role');
    }     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comment.index');        
    }

    public function apiComment()
    {
        $comment = Comment::all();
        // $comment = Comment::select(['id', 'article_id', 'content', 'user', 'created_at', 'updated_at']);
        return Datatables::of($comment)
            ->addColumn('action', function ($comment) {
                return '<a href="#" class="btn btn-floating btn-xs btn-primary"><i class="fa fa-eye"></i> Show</a>'.
                   '<a href="#" onclick="editForm('.$comment->id.')" title="edit" class="btn btn-floating btn-xs yellow"><i class="fa fa-edit"></i></a>'.
                   '<a href="#" onclick="deleteData('.$comment->id.')" title="delete" class="btn btn-floating btn-xs black"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('password')
            ->make(true);        
        // return Datatables::of($comment)
        //     ->addColumn('action', function ($comment) {
        //         return '<a href="#" class="btn btn-floating btn-xs btn-primary" title="show"><i class="fa fa-info"></i></a>'.
        //                '<a href="#" onclick="editForm('.$comment->id.')" title="edit" class="btn btn-floating btn-xs yellow"><i class="fa fa-edit"></i></a>'.
        //                '<a href="#" onclick="deleteData('.$comment->id.')" title="delete" class="btn btn-floating btn-xs black"><i class="fa fa-trash"></i></a>';
        //     })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $create = true;        
        // return view('comment.create')->with('create',$create); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->article_id);
        $validate = Validator::make($request->all(), Comment::valid());
        if ($validate->fails()) {
            Alert::error('Failed Added comment');
            return redirect()->route('comments.index', $request->id)
                ->withErrors($validate)
                ->withInput();
        } else {
            Comment::create($request->all());
            // Session::flash('notice', 'Success add comment');
            Alert::success('Success Add comment');
            // return Redirect::to('articles/'. $request->article_id);
            return redirect()->route('comments.index', $request->id);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comment::find($id);
        // $create = false;        
        return $comments; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comments = Comment::find($id)->update($request->all());
        
        if ($comments) {
            Alert::success('Comment success updated');
            return redirect()->route("comment.show",$id);
        } else {
            Alert::error('Comment fail updated');
            return redirect()->route("comment.show",$id);
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
       Comment::destroy($id);
    }
}
