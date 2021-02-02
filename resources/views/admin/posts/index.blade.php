@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Intestazione</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Data</th>
                    <th scope="sol">Categoria</th>
                    <th scope="sol">Tags</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->header }}</td>
                        <td>{{ $post->author }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>
                            @if ($post->category)
                                <a href="{{ route('admin.categories.show', [ 'category' => $post->category->id ]) }}">
                                    {{ $post->category->name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @forelse ($post->tags as $tag)
                                <a href="{{ route('admin.tags.show', [ 'tag' => $tag->id ]) }}">{{ $tag->name }}</a>{{ $loop->last ? '.' : ',' }}
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.posts.show', [ 'post' => $post->id ]) }}">Dettaglio</a>
                            <a class="btn btn-warning" href="{{ route('admin.posts.edit', [ 'post' => $post->id ]) }}">Modifica</a>
                            <form class="d-inline-block" action="{{ route('admin.posts.destroy', [ 'post' => $post->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Aggiungi prodotto</a>
    </div>
</div>
@endsection
