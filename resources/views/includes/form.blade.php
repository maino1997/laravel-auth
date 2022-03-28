@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    @if ($post->exists)
        <form action='{{ route('admin.posts.update', $post->id) }}' method='POST'>
            @method('PUT')
        @else
            <form action="{{ route('admin.posts.store') }}" method="POST">
    @endif
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
            aria-describedby="emailHelp" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">URL dell'immagine</label>
        <input type="text" class="form-control  @error('image') is-invalid @enderror" id="exampleInputPassword1"
            name="image" value="{{ old('image', $post->image) }}">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-check-label" for="exampleCheck1">Contenuto</label>
        <input type="text" class="form-control  @error('content') is-invalid @enderror" id="exampleCheck1"
            name="content" value="{{ old('content', $post->content) }}">
        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crea</button>
    </form>

</div>
