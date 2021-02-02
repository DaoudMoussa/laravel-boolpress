@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.show', [ 'category' => $category->slug ]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
