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

    public function getComments()
    {
        // cara 1
        // $comments = Comment::all();
        // return Datatables::of($comments)->make(true);
        
        // $comments = Comment::select(['id', 'article_id', 'content','user', 'created_at', 'updated_at'])->get();
        $comments = Comment::all();
        return Datatables::of($comments)
            ->addColumn('action', function($comments)  {
            return '<a href="#" class="btn-floating btn-float waves-effect waves-teal blue btn-xs" title="Show"><i class="fa fa-info"></i></a>'.
                   '<a onclick="editForm('.$comments->id.')" href="comment/'.$comments->id.'/edit" class="btn-floating btn-float waves-effect waves-teal yellow btn-xs" title="Edit"><i class="fa fa-edit"></i></a>'.
                   '<a onclick="deleteData('.$comments->id.')" class="btn-floating btn-float waves-effect waves-teal red btn-xs" title="Delete"><i class="fa fa-trash"></i></a>';
                })->make(true);
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
        $comments = Comment::find($id);
        $create = false;        
        return view('comment.edit',compact('comment','create'));    
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
