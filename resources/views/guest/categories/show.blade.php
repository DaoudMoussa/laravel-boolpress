@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    {{ $category->name }}
                </h1>

                @if ($category->posts->count())
                    <ul>
                        @foreach ($category->posts as $post)
                            <li>
                                <a href="{{ route('posts.show', ['post' => $post->slug]) }}">
                                    {{ $post->header }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Non ci sono post associati</p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
