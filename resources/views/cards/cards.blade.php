@extends('layouts.panel')
@section('title', ' | cards')

@section('panel-heading')
    <strong>All List of Cards</strong>
@stop

@section('panel-body')
    @if (session('status'))
        <div class="alert alert-{{ session('status_level') }}">
            {{ session('status') }}
        </div>
    @endif
    <ul class="list-group card-list">
        @forelse ($cards as $card)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-10"><a href="{{ url('/card/'.$card->slug.'/notes') }}">{{ $card->title }}</a></div>
                    <div class="col-md-2 text-right">
                        <form method="POST" action="{{ url('/card/'.$card->slug.'/delete') }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="{{ url('/card/'.$card->slug.'/edit') }}"><i class="fa fa-btn fa-edit text-info"></i></a>
                            <button class="button-icon" type="submit"><i class="fa fa-btn fa-trash-o text-danger"></i></button>
                        </form>
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
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-md-4 control-label">New Card:</label>
            <div class="col-md-6">
                <input name="title" id="title" class="form-control" placeholder="Type title of card ..." value="{{ old('title') }}" />
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
                    <i class="fa fa-btn fa-sign-in"></i>&nbsp; Submit
                </button>
            </div>
        </div>
    </form>
@stop
