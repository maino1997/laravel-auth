@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Titolo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">URL dell'immagine</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="image">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label" for="exampleCheck1">Contenuto</label>
            <input type="text" class="form-control" id="exampleCheck1" name="content">
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
@endsection
