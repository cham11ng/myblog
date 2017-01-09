@extends('layouts.front')
@section('title', ' | cards')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Cards</div>
                <div class="panel-body">
                    <ul>
                        @foreach ($cards as $card)
                            <li><a href="{{ url('/card/'.$card->card_slug) }}">{{ $card->card_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
