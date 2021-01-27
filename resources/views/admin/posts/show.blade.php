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
                            <p>{{ $post->category->name }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
