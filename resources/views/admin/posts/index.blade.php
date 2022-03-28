@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <header>
                    <h1>I miei post:</h1>
                </header>
                <div class="add-posts">
                    <i class="fa-solid fa-plus">
                        <a href="{{ route('admin.posts.create') }}">Crea un post</a>
                    </i>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Creation date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td><img src="{{ $post->image }}" alt="{{ $post->image }}"></td>
                                <td><a href="{{ route('admin.posts.show', $post->id) }}">Dettaglio</a></td>
                                <td><a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a></td>
                                <td>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                        class="delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Elmina</button>
                                    </form>
                                </td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-pen-to-square mr-3"></i>
                                    <i class="fa-solid fa-trash"></i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <h3>Non ci sono post</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src=" {{ config('js\confirmation-delete.js') }}"></script>
@endsection
