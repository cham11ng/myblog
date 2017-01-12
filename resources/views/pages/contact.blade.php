@extends('layouts.panel')
@section('title', ' | contact')
@section('panel-heading')
    Contact Me
@endsection

@section('panel-body')
    <form class="form-horizontal" role="form" method="POST">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address:</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
            <label for="subject" class="col-md-4 control-label">Subject:</label>
            <div class="col-md-6">
                <input id="subject" class="form-control" name="subject" value="{{ old('subject') }}">

                @if ($errors->has('subject'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label for="message" class="col-md-4 control-label">Message:</label>
            <div class="col-md-6">
                <textarea name="message" id="message" class="form-control" placeholder="Type your message here...">{{ old('message') }}</textarea>
                @if ($errors->has('message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Submit
                </button>
            </div>
        </div>
    </form>
@endsection