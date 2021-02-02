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
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.categories.show', [ 'category' => $category->id ]) }}">Dettaglio</a>
                            <a class="btn btn-warning" href="{{ route('admin.categories.edit', [ 'category' => $category->id ]) }}">Modifica</a>
                            <form class="d-inline-block" action="{{ route('admin.categories.destroy', [ 'category' => $category->id ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Aggiungi categoria</a>
    </div>
</div>
@endsection
