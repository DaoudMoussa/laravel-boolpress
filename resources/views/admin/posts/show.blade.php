@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <ul>
                        <li>
                            <h1>{{ $post->header }}</h1>
                            <p>{{ $post->id }}</p>
                            <p>{{ $post->body }}</p>
                            <p>{{ $post->author }}</p>
                            <p>{{ $post->post_date }}</p>
                            <p>{{ $post->slug }}</p>
                            <p>Categoria: {{ $post->category ? $post->category->name : '-' }}</p>

                            <p>
                                tags:
                                @forelse ($post->tags as $tag)
                                    {{ $tag->name }}{{ $loop->last ? '.' : ',' }}
                                @empty
                                    -
                                @endforelse
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
