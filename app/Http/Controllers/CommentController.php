<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreRequest $request)
    {
        Comment::create($request->validated());
        return redirect()->route('posts.index');
    }
}
