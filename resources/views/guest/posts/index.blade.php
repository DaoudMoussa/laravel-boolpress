@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', [ 'post' => $post->slug ]) }}">
                        {{ $post->header }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
