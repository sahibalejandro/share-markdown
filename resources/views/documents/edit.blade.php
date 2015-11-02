@extends('layout')

@section('scripts')
    <script src="{{ asset('js/documents.edit.js') }}"></script>
@append

@section('content')

    <div id="document">

        <input type="hidden" v-model="uuid" value="{{ $doc->uuid }}">

        <div class="page-header">
            <input type="text" class="doc-name" value="{{ $doc->name }}" v-model="name">

            Share: <a href="{{ $doc->url() }}">{{ $doc->url() }}</a>

            <span v-show="saving" class="doc-saving">Saving&hellip;</span>
            <span v-show="saveFailed" class="doc-saving">Can't save!</span>

            <form action="{{ route('documents.destroy', $doc->uuid) }}" method="post">
                {{ method_field('DELETE') }} {{ csrf_field() }}

                <button type="submit" class="btn btn-danger btn-xs">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </form>

        </div>

        <div class="row">

            <div class="col-sm-6">
                <textarea v-model="content" class="doc-content">{{ $doc->content }}</textarea>
            </div>

            <div class="col-sm-6">
                <div v-html="html"></div>
            </div>

        </div>
    </div>

@stop