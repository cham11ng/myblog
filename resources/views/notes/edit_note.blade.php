@extends('layouts.panel')

@section('title', ' | edit note')

@section('panel-heading')
    <strong><a href="{{ url('/card/'.$note->card->slug.'/notes') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;&nbsp;{{ $note->card->title }} >> Notes</strong>
@stop

@section('panel-body')
    @if (session('status'))
        <div class="alert alert-{{ session('status_level') }}">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="/note/{{ $note->id }}" class="form-horizontal" role="form">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            <label for="body" class="col-md-4 control-label">Edit Note:</label>
            <div class="col-md-6">
                <textarea name="body" id="body" class="form-control" placeholder="Type a note ...">{{ old('body', $note->body) }}</textarea>
                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
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