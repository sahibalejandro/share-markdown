@extends('layout')

@section('content')


    <div class="jumbotron text-center">

        <h3>Start sharing markdown documents!</h3>

        <div class="lead">No registration needed, just login using your Google account.</div>

        <a href="{{ route('auth.redirect', 'google') }}">
            <img src="{{ asset('i/btn_google_signin_dark_normal_web@2x.png') }}" class="google-sign-in" alt="Sign in with Google">
        </a>

    </div>

@stop