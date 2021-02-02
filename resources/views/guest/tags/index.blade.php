@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <ul>
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('tags.show', [ 'tag' => $tag->slug ]) }}">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
