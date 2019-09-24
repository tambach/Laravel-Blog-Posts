@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Sample laravel App</h1>
        <p>welcome to the sample laravel app</p>
        <p>Please login or register to add, delete or edit posts </p>

        @if (Auth::guest())
            <div>
                <a class="btn btn-default btn-lg" href="/login" role="button">Login</a>
                <a class="btn btn-default btn-lg" href="/register" role="button">Register</a>
            </div>
        @endif

    </div>
@endsection