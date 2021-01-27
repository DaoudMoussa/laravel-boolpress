@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->header }}</h1>
                <p>{{ $post->body }}</p>
            </div>
            <div class="col-4">data di pubblicazione: {{ $post->post_date }}</div>
            <div class="col-4">Autore: {{ $post->author }}</div>
            <div class="col-4">Categoria: {{ $post->category->name }}</div>
        </div>
    </div>
</main>
@endsection
