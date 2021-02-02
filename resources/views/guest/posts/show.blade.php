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
                <div class="col-4">Categoria:
                    @if ($post->category)
                        <a href="{{ route('categories.show', [ 'category' => $post->category->slug ]) }}">
                            {{ $post->category->name }}
                        </a>
                    @else
                        -
                    @endif
                </div>
                <div class="col-4">tags:
                    @forelse ($post->tags as $tag)
                        <a href="{{ route('tags.show', [ 'tag' => $tag->slug ]) }}">{{ $post->category->name }}</a>{{ $loop->last ? '.' : ',' }}
                    @empty
                        -
                    @endforelse
                </div>
        </div>
    </div>
</main>
@endsection
