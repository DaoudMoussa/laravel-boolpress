@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>
                        Categoria: {{ $tag->name }}
                    </h1>

                    @forelse ($tag->posts as $post)
                        <ul>
                            <li>
                                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                    {{ $post->header }}
                                </a>
                            </li>
                        </ul>

                    @empty
                        <p>
                            Non ci sono post associati a questo tag
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
