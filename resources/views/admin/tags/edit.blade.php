@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.tags.update', [ 'tag' => $tag->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nome tag</label>
                            <input value="{{ $tag->name }}" type="text" name="name" class="form-control" placeholder="Inserisci nome tag">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
