<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{

    private $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function index()
    {
        $posts = $this->model->with('comments')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.add');
    }

    public function store(StoreRequest $request)
    {
        $pathImage = uploadFile($request->image, 'posts');

        $this->model->create(['image' => $pathImage] + $request->validated());
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        if (auth()->id() != $post->user_id)
            abort(403);

        return view('post.edit', compact('post'));
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $pathImage = $post->image;

        if ($request->image) {
            deletFile($post->image);
            $pathImage = uploadFile($request->image, 'posts');
        }

        $post->update(['image' => $pathImage] + $request->validated());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if (auth()->id() != $post->user_id)
            abort(403);

        $post->delete();
        return redirect()->route('posts.index');
    }

    public function onlyTrashed()
    {
        $posts = $this->model->onlyTrashed()->with('comments')->get();
        return view('post.deleted', compact('posts'));
    }

    public function restore($id)
    {
        $post = $this->model->withTrashed()->find($id);

        if (auth()->id() != $post->user_id)
            abort(403);

        $post->restore();
        return redirect()->route('posts.index');
    }

    public function forceDelete($id)
    {
        $post = $this->model->withTrashed()->find($id);

        if (auth()->id() != $post->user_id)
            abort(403);

        $post->forceDelete();
        return redirect()->route('posts.index');
    }
}
