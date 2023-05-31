<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'content' => 'required',
            'user_id' => 'required',
            'post_id'=>'required'

        ]);
        comment::create([
            'content'=>$request['content'],
            'user_id'=>$request['user_id'],
            'post_id'=>$request['post_id']
        ]);

        $forum_id=$request['forum_id'];
        $post_id=$request['post_id'];
         

        return redirect()->route('forum.post.show',[$forum_id,$post_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post_id,$comment_id)
    {
        $post=Post::find($post_id);
        $forum_id=$post['forum_id'];
    $comment=Comment::find($comment_id)->delete();
        return redirect()->route('forum.post.show',[$forum_id,$post_id])

                        ->with('success','Comment deleted successfully');

    
    }
}
