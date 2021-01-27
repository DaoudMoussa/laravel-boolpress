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
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
