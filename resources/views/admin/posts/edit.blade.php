@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.posts.update', [ 'post' => $post->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Titolo post</label>
                            <input value="{{ $post->header }}" type="text" name="header" class="form-control" placeholder="Inserisci titolo post">
                        </div>
                        <div class="form-group">
                            <label>Autore</label>
                            <input value="{{ $post->author }}" type="text" name="author" class="form-control" placeholder="Inserisci il nome dell'autore">
                        </div>
                        <div class="form-group">
                            <label>Testo post</label>
                            <textarea rows="10" type="text" name="body" class="form-control" placeholder="Inserisci testo del post">{{ $post->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="category_id">
                                <option value="">--seleziona categoria--</option>
                                @foreach (App\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected=selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
