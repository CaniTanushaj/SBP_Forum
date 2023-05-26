<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

                        ->with('success','post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $request->validate([

            'name' => 'required',

            'description' => 'required',

        ]);

        

        $product->update($request->all());

        

        return redirect()->route('post.index')

                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    $product=post::find($id)->delete();

         

        return redirect()->route('post.index')

                        ->with('success','Product deleted successfully');

    
    }
}
