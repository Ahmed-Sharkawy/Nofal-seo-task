@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between ">
            @if (auth()->user()->role == 1)
                <a href="{{ route('posts.create') }}" style="width: 120px" class="btn btn-success mb-5 col-m-4">Create Post</a>
                <a href="{{ route('posts.onlyTrashed') }}" style="width: 120px" class="btn btn-danger mb-5 col-m-4">Deleted</a>
            @endif
        </div>

        <div class="row justify-content-between">
            @foreach ($posts as $post)
                <div class="card col-m-4  mb-4" style="width: 18rem;">
                    <img src="{{ asset("storage/$post->image") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->author }}</p>
                        <div class="row justify-content-between">
                            <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-success col-5">Recovery</a>
                            <a href="{{ route('posts.forceDelete', $post->id) }}" class="btn btn-danger col-5">Delete</a>
                        </div>
                    </div>
                    <hr/>
                    <div for="add-comment" class="form-label">Comments</div>

                    <div class="card-body">
                        @foreach ($post->comments as $i => $comment)
                            <hr/>
                            <p>{{ $i+1 }} - {{ $comment->comment }}</p>
                        @endforeach

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
