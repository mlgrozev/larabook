@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to larabook!</h1>
            <p>Welcome to laravel Larabook!</p>
            <p>
                {{ link_to_route('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) }}
            </p>
          </div>
@stop