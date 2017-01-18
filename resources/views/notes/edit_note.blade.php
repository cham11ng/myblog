@extends('layouts.panel')

@section('title', ' | edit note')

@section('panel-heading')
    <strong><a href="{{ url('/card/'.$note->card->slug.'/notes') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;&nbsp;{{ $note->card->title }} >> Notes</strong>
@stop

@section('panel-body')
    <form method="POST" action="/note/{{ $note->id }}" class="form-horizontal" role="form">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
            <label for="content" class="col-md-4 control-label">Edit Note:</label>
            <div class="col-md-6">
                <textarea name="content" id="content" class="form-control" placeholder="Type a note ...">{{ old('content', $note->content) }}</textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
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