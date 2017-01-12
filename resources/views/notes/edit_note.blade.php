@extends('layouts.panel')

@section('title', ' | edit note')

@section('panel-heading')
    <strong><a href="{{ url('/card/'.$note->card->card_slug.'/notes') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;&nbsp;{{ $note->card->card_title }} >> Notes</strong>
@stop

@section('panel-body')
    <form method="POST" action="/note/{{ $note->id }}" class="form-horizontal" role="form">
        {{ method_field('PATCH') }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group{{ $errors->has('note_content') ? ' has-error' : '' }}">
            <label for="note_content" class="col-md-4 control-label">Edit Note:</label>
            <div class="col-md-6">
                <textarea name="note_content" id="note_content" class="form-control" placeholder="Type a note ...">{{ old('note_content', $note->note_content) }}</textarea>
                @if ($errors->has('note_content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('note_content') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Submit
                </button>
            </div>
        </div>
    </form>
@stop