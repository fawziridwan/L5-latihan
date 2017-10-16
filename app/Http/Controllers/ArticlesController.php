<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use Session;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a form search of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()    
    {
        // 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index')->with('articles',$articles);
    }

    /**
     * tampil the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('articles.create');
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
        return view('articles.show')
        ->with('articles', $articles)
        ->with('comments', $comments);        
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
        return view('articles.edit')->with('articles', $articles);    
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
            Session::flash("notice", "Article success updated");
            return redirect()->route("articles.show",$id);
        } else {
            Session::flash("error", "Article fail updated");
            return redirect()->route("articles.show",$id);
        }
        // return redirect()->route("articles.show",$id);
        // Article::find($id)->update($request->all());
        // Session::flash("notice", "Article success updated");
        // return redirect()->route("articles.show",$id);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if (Article::create($request->all())) {
            Session::flash("notice", "Article success created");
        } else {
            Session::flash("error", "Data fail to created");
        }
        return redirect()->route("articles.index");        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        Session::flash("notice", "Article success deleted");
        return redirect()->route("articles.index");
    }
}
    