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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->article_id);
        $validate = Validator::make($request->all(), Comment::valid());
        if ($validate->fails()) {
            return redirect()->route('articles.show', $request->article_id)
                ->withErrors($validate)
                ->withInput();
        } else {
            Comment::create($request->all());
            // Session::flash('notice', 'Success add comment');
            Alert::success('Success Add comment');
            // return Redirect::to('articles/'. $request->article_id);
            return redirect()->route('articles.show', $request->article_id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
