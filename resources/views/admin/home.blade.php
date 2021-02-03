@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @if (!Auth::user()->api_token)
                    <form action="{{ route('admin.getApiToken') }}" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Get api token</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
