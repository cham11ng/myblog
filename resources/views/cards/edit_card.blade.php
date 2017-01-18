@extends('layouts.panel')

@section('title', 'edit card')

@section('panel-heading')
    <strong>
        <a href="{{ url('/cards') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;Edit Card Name
    </strong>
@stop

@section('panel-body')
    <form method="POST" action="/card/{{ $card->slug }}" class="form-horizontal" role="form">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">Edit card:</label>
            <div class="col-md-6">
                <input name="title" id="title" class="form-control" placeholder="Type a note ..." value="{{ old('title', $card->title) }}" />
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
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