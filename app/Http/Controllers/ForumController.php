<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forum = Forum::all();
        $mytime =Carbon::now();

        return view('forum.index',compact('forum','mytime'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'user_id' => 'required'

        ]);
        Forum::create([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'user_id'=>$request['user_id']
        ]);

         

        return redirect()->route('forum.index')

                        ->with('success','Forum created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        return view('forum.show',compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        return view('forum.edit',compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([

            'name' => 'required',

            'description' => 'required',

        ]);

        

        $forum->update($request->all());

        

        return redirect()->route('forum.index')

                        ->with('success','Forum updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    $product=Forum::find($id)->delete();

         

        return redirect()->route('forum.index')

                        ->with('success','Forum deleted successfully');

    
    }
}
