@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $post->title }}</h2>
                <img src="{{ $post->image }}" alt="image">
                <p>{{ $post->content }}</p>
            </div>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            <a href="{{ route('admin.posts.index') }}">Indietro</a>
        </div>
    </div>
@endsection
