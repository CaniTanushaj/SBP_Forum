<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use Illuminate\Http\Request;

class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = post::all();
        $mytime =Carbon::now();

        return view('post.index',compact('post','mytime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($forum_id)
    {
        return view('post.create',compact('forum_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'forum_id'=>'required'

        ]);
        post::create([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'user_id'=>$request['user_id'],
            'forum_id'=>$request['forum_id']
        ]);

         

        return redirect()->route('forum.show',$request['forum_id'])

                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(forum $forum,post $post)
    {
        return view('post.show',compact('forum','post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(forum $forum,post $post)
    {
        return view('post.edit',compact('forum','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$forum, post $post)
    {
        $request->validate([

            'name' => 'required',

            'description' => 'required',

        ]);

        

        $post->update($request->all());

        

        return redirect()->route('forum.show',$request['forum_id'])

        ->with('success','Post created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($forum_id,$post_id)
    {

    $product=post::find($post_id)->delete();

         

        return redirect()->route('forum.show',$forum_id)

                        ->with('success','Post deleted successfully');

    
    }
}
