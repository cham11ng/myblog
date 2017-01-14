@extends('layouts.panel')
@section('title', '| notes')

@section('panel-heading')
    <strong><a href="{{ url('/cards') }}"><i class="fa fa-btn fa-arrow-left"></i></a>&nbsp;&nbsp;{{ $card->card_title }} >> Notes</strong>
@stop

@section('panel-body')
    <label class="title">List of Notes:</label>
    <ul class="list-group note-list">
        @forelse ($card->notes as $note)
            <li class="list-group-item animated bounceInDown">
                <div class="row">
                    <div class="col-md-9 text-justify">{{ $note->note_content }}</div>
                    <div class="col-md-3 text-right">
                        <em>By: {{ $note->user->username }}&nbsp;</em>
                        <a href="{{ url('note/'.$note->id.'/edit') }}"><i class="fa fa-btn fa-edit text-info"></i></a>
                        <a href="{{ url('note/'.$note->id.'/delete') }}"><i class="fa fa-btn fa-trash-o text-danger"></i></a>
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
    <form method="POST" action="/card/{{ $card->card_slug }}/add_note" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group{{ $errors->has('note_content') ? ' has-error' : '' }}">
            <label for="note_content" class="col-md-4 control-label">New Note:</label>
            <div class="col-md-6">
                <textarea name="note_content" id="note_content" class="form-control" placeholder="Type note about a card {{ $card->card_title }} ...">{{ old('note_content') }}</textarea>
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