@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Titolo post</label>
                            <input type="text" name="header" class="form-control" placeholder="Inserisci titolo post">
                        </div>
                        <div class="form-group">
                            <label>Autore</label>
                            <input type="text" name="author" class="form-control" placeholder="Inserisci il nome dell'autore">
                        </div>
                        <div class="form-group">
                            <label>Testo post</label>
                            <textarea rows="10" type="text" name="body" class="form-control" placeholder="Inserisci testo del post"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="category_id">
                                <option value="">--seleziona categoria--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <input value="{{ $tag->id }}" name="tags[]" type="checkbox" class="form-check-input">
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
