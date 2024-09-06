<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
    public function store(Request $request , $id)
    {
        $postId=$id;

        $input=$request->all();
        Comment::create([
            'content'=>$input['comment_content'],
            'user_id'=> Auth()->id(),
            'post_id'=>$postId
        ]);
        session()->flash('success', 'Comment created successfully!');

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
        $comment=Comment::find($id);
        $input=$request->all();

        if (empty($comment)) {
            session()->flash('error', 'Comment not found');

            return redirect(route('dashboard'));
        }

        $comment->update([

            'content'=>$input['commentContentInput'],
        ]);

        session()->flash('success', 'Comment updated successfully!');

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment=Comment::find($id);

        if (empty($comment)) {
            session()->flash('error', 'Comment not found');

            return redirect(route('dashboard'));
        }

        $comment->delete();

        session()->flash('success', 'Comment deleted successfully!');

        return redirect(route('dashboard'));
    }
}
