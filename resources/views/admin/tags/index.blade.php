@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="sol">name</th>
                    <th scope="col">slug</th>
                    <th scope="col">azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.tags.show', [ 'tag' => $tag->id ]) }}">Dettaglio</a>
                            <a class="btn btn-warning" href="{{ route('admin.tags.edit', [ 'tag' => $tag->id ]) }}">Modifica</a>
                            <form class="d-inline-block" action="{{ route('admin.tags.destroy', [ 'tag' => $tag->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">Aggiungi categoria</a>
    </div>
</div>
@endsection
