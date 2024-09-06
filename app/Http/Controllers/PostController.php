<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        $input=$request->all();
// dd($input);
        Post::create([
            'title'=>$input['title'],
            'content'=>$input['content'],
            'user_id'=> Auth()->id(),
        ]);
        session()->flash('success', 'Post created successfully!');

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::find($id);
        $input=$request->all();

        if (empty($post)) {
            session()->flash('error', 'Post not found');

            return redirect(route('dashboard'));
        }

        $post->update([

            'title'=>$input['title'],
            'content'=>$input['content'],
        ]);

        session()->flash('success', 'Post updated successfully!');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);

        if (empty($post)) {
            session()->flash('error', 'Post not found');

            return redirect(route('dashboard'));
        }

        $post->delete();

        session()->flash('success', 'Post deleted successfully!');

        return redirect(route('dashboard'));

    }
}
