@extends('layouts.panel')

@section('title', 'edit card')

@section('panel-heading')
    <strong>
        <a href="{{ url('/cards') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;Edit Card Name
    </strong>
@stop

@section('panel-body')
    <form method="POST" action="/card/{{ $card->card_slug }}" class="form-horizontal" role="form">
        {{ method_field('PATCH') }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group{{ $errors->has('card_title') ? ' has-error' : '' }}">
            <label for="card_title" class="col-md-4 control-label">Edit card:</label>
            <div class="col-md-6">
                <input name="card_title" id="card_title" class="form-control" placeholder="Type a note ..." value="{{ old('card_title', $card->card_title) }}" />
                @if ($errors->has('card_title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('card_title') }}</strong>
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