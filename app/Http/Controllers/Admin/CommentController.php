<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function create($postId)
    {
        $post = Post::find($postId);
        return view('admin.comments.create', compact('post'));
    }


    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $postId)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $data = $request->all();
        $data['post_id'] = $postId;

        Comment::create($data);

        return redirect()->route('admin.posts.index', $postId)->with('success', 'Коммент добавлен');
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
    public function edit($postId, $commentId)
    {
        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        return view('admin.comments.edit', compact('post', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $postId, $commentId)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        $comment->text = $request->input('text');
        $comment->save();

        return redirect()->route('admin.posts.index', $post->id)->with('success', 'Коммент отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId, $commentId)
    {
        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        $comment->delete();

        return redirect()->route('admin.posts.index', $post->id)->with('success', 'Коммент удален');
    }
}
