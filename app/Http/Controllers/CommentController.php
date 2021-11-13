<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $this->validate($request,[
            'post_id'=>'required',
            'content'=>'required'
        ]);

        $comment=new Comment();
        $comment->post_id=$request->post_id;
        $comment->content=$request->content;
        $comment->user_id=auth()->user()->id;
        $comment->save();
        return back()->with('successMsg','comments added successfully');
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
        $comment=Comment::findOrFail($id);
        if( Gate::allows('comment-delete', $comment) ) {
            $comment->delete();
            return back()->with('status','comment deleted successfully');
            } else {
            return back()->with('error', 'Unauthorize');
            }

        // $comment->delete();
        // return back()->with('status','comment deleted successfully');
    }

    // public function delete($id)
    // {
    //     $comment = Comment::find($id);
    //     if(Gate::denies('comment-delete', $comment)) {
    //     return back()->with('error', 'Unauthorize'); 
    // }
    //     $comment->delete();
    //     return back();
    // }
}
