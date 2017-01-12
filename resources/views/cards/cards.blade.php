@extends('layouts.panel')
@section('title', ' | cards')

@section('panel-heading')
    <strong>All List of Cards</strong>
@stop

@section('panel-body')
    <ul class="list-group card-list">
        @forelse ($cards as $card)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-10"><a href="{{ url('/card/'.$card->card_slug.'/notes') }}">{{ $card->card_title }}</a></div>
                    <div class="col-md-2 text-right">
                        <a href="{{ url('/card/'.$card->card_slug.'/edit') }}"><i class="fa fa-btn fa-edit text-info"></i></a>
                        <a href="{{ url('/card/'.$card->card_slug.'/delete') }}"><i class="fa fa-btn fa-trash-o text-danger"></i></a>
                    </div>
                </div>
            </li>
        @empty
            <li class="alert alert-danger alert-dismissable animated bounceIn">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sorry!</strong> No Available Cards
            </li>
        @endforelse
    </ul>

    <hr />
    <form method="POST" action="/card/add_card" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group{{ $errors->has('card_title') ? ' has-error' : '' }}">
            <label for="card_title" class="col-md-4 control-label">New Card:</label>
            <div class="col-md-6">
                <input name="card_title" id="card_title" class="form-control" placeholder="Type title of card ..." value="{{ old('card_title') }}" />
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
                    <i class="fa fa-btn fa-sign-in"></i>&nbsp; Submit
                </button>
            </div>
        </div>
    </form>
@stop
