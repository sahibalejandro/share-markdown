@extends('layout')

@section('content')


    <div class="jumbotron text-center">

        <h3>Start sharing markdown documents!</h3>

        <div class="lead">No registration needed, just use your Google account!</div>

        <a href="{{ route('auth.google') }}" class="btn btn-lg btn-primary">Start sharing!</a>

    </div>

@stop