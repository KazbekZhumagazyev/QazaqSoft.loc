<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png',
        ]);

        $data = $request->all();

        $data['poster'] = Post::uploadImage($request);
        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Пост добавлен');
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
        $post = Post::find($id);
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'poster' => 'nullable|image|mimes:jpeg,png',
        ]);

        $post = Post::find($id);
        $data = $request->all();

        if ($file = Post::uploadImage($request, $post->poster)) {
            $data['poster'] = $file;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Пост удален');
    }
}
