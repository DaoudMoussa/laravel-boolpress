@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <ul>
            @foreach ($posts as $post)
                <li>
                    {{ $post->header }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
