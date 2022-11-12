@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                @error('title')
                <span style="color: red"> => {{ $message }}</span>
                @enderror
                <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{ old('title') }}" aria-describedby="TitleHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Author</label>
                @error('author')
                    <span style="color: red"> => {{ $message }}</span>
                @enderror
                <input type="text" name="author" value="{{ old('author') }}" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                @error('image')
                <span style="color: red"> => {{ $message }}</span>
                @enderror
                <input type="file" name="image" class="form-control" aria-label="file example">
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
