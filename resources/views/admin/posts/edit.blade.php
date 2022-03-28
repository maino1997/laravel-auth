@extends('layouts.app')

@section('content')
    <form action='{{ route('admin.posts.update', $post->id) }}' method='POST'>
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Titolo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='title'
                value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Immagine</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name='image'
                value="{{ old('image', $post->image) }}">
        </div>
        <div class="form-group form-check">
            <label for="exampleCheck1">Contenuto</label>
            <input type="text" class="form-control" id="exampleCheck1" name='content'
                value="{{ old('content', $post->content) }}">
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
@endsection
