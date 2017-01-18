@extends('layouts.panel')
@section('title', '| notes')

@section('panel-heading')
    <strong><a href="{{ url('/cards') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;&nbsp;{{ $card->title }} >> Notes</strong>
@stop

@section('panel-body')
    <label class="title">List of Notes:</label>
    <ul class="list-group note-list">
        @forelse ($card->notes as $note)
            <li class="list-group-item animated bounceInDown">
                <div class="row">
                    <div class="col-md-9 text-justify">{{ $note->body }}</div>
                    <div class="col-md-3 text-right">
                        <form method="POST" action="{{ url('note/'.$note->id.'/delete') }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <em>By: {{ $note->user->username }}&nbsp;</em>
                            <a href="{{ url('note/'.$note->id.'/edit') }}"><i class="fa fa-btn fa-edit text-info"></i></a>
                            <button class="button-icon" type="submit"><i class="fa fa-btn fa-trash-o text-danger"></i></button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
            <li class="alert alert-danger alert-dismissable animated bounceIn">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sorry!</strong> No Available Notes
            </li>
        @endforelse
    </ul>

    <hr />
    <form method="POST" action="/card/{{ $card->slug }}/add_note" class="form-horizontal" role="form">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            <label for="body" class="col-md-4 control-label">New Note:</label>
            <div class="col-md-6">
                <textarea name="body" id="body" class="form-control" placeholder="Type note about a card {{ $card->title }} ...">{{ old('body') }}</textarea>
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