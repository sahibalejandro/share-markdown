@extends('layout')

@section('container-class') container @stop

@section('scripts')
    <script src="{{ asset('js/documents.show.js') }}"></script>
@append

@section('content')

    <div class="page-header">
        <h3>{{ $doc->name }}</h3>
        Share: <a href="{{ $doc->url() }}">{{ $doc->url() }}</a>

        @if (Auth::user()->owns($doc))
            <a href="{{ route('documents.edit', $doc->uuid) }}" class="btn btn-default">
                <i class="glyphicon glyphicon-pencil"></i>
                Edit
            </a>
        @endif

    </div>

    <div id="document">
        <input type="hidden" v-model="content" value="{{ $doc->content }}">
        <div v-html="html"></div>
    </div>

@stop