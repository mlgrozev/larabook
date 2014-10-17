@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6">
    <h1>Sign In</h1>
        {{ Form::open(['route' => 'login_path']) }}
            <!-- Email From Input -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>
            
            <!-- Password From Input -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>
             
            <!--  Sign In Input -->
            <div class="form-group">
                {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
                {{ link_to('password/remind', 'Reset Your Password') }}
            </div>
        
        {{ Form::close() }}
    </div>
</div>
@stop