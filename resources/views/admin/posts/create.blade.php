@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Titolo post</label>
                            @error ('header')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input value="{{ old('header') }}" type="text" name="header" class="form-control" placeholder="Inserisci titolo post">
                        </div>
                        <div class="form-group">
                            <label>Autore</label>
                            @error ('author')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input value="{{ old('author') }}" type="text" name="author" class="form-control" placeholder="Inserisci il nome dell'autore">
                        </div>
                        <div class="form-group">
                            <label>Testo post</label>
                            @error ('body')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <textarea value="{{ old('body') }}" rows="10" type="text" name="body" class="form-control" placeholder="Inserisci testo del post">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            @error ('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label>Categoria</label>
                            <select name="category_id">
                                <option value="">--seleziona categoria--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected=selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <p>Tags:</p>
                            @error ('tags')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input value="{{ $tag->id }}" name="tags[]" type="checkbox" class="form-check-input" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
