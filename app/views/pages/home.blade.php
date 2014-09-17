@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to larabook!</h1>
            <p>Welcome to laravel Larabook!</p>
            @if ( ! $currentUser)
                <p>
                    {{ link_to_route('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) }}
                </p>
            @endif
          </div>
@stop