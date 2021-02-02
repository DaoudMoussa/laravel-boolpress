@extends('layouts.dashboard')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nome tag</label>
                            <input type="text" name="name" class="form-control" placeholder="Inserisci nuovo tag">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
