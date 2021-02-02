@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>
                        Categoria: {{ $category->name }}
                    </h1>

                    @forelse ($category->posts as $post)
                        <ul>
                            <li>
                                <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                    {{ $post->header }}
                                </a>
                            </li>
                        </ul>

                    @empty
                        <p>
                            Non ci sono post associati a questa categoria
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
