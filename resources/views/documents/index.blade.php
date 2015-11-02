@extends('layout')

@section('content')

    <div class="page-header">
        <h3>My Documents</h3>
    </div>

    @foreach($docs as $doc)

        <div>
            &bull; <a href="{{ route('documents.edit', $doc->uuid) }}">{{ $doc->name }}</a>
            - <small>{{ $doc->created_at->formatLocalized('%a %d, %b %Y - %R Hrs.') }}</small>
        </div>

    @endforeach

@stop