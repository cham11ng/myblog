@extends('layouts.front')
@section('title', '| cards')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Card Name: </strong> {{ $card->card_title }}</div>
                <div class="panel-body">
                    <label class="title">List of Notes:</label>

                    @forelse ($card->notes as $note)
                        <div class="alert alert-info animated bounceInDown">{{ $note->note_content }}</div>
                    @empty
                        <div class="alert alert-danger alert-dismissable animated bounceIn">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Sorry!</strong> No Available Notes
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection