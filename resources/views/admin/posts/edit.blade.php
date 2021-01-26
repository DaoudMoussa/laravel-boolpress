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
                            <label>Nome</label>
                            <input value="{{ $post->header }}" type="text" name="name" class="form-control" placeholder="Inserisci nome prodotto">
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <input value="{{ $post->body }}" type="text" name="type" class="form-control" placeholder="Inserisci tipo prodotto">
                        </div>
                        <div class="form-group">
                            <label>Autore</label>
                            <input value="{{ $post->author }}" type="text" name="type" class="form-control" placeholder="Inserisci tipo prodotto">
                        </div>
                        <div class="form-group">
                            <label>Data di publicazione</label>
                            <input value="{{ $post->post_date }}" type="text" name="type" class="form-control" placeholder="Inserisci tipo prodotto">
                        </div>
                        <div class="form-group">
                            <label>slug</label>
                            <input value="{{ $post->slug }}" type="text" name="type" class="form-control" placeholder="Inserisci tipo prodotto">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
