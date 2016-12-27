@extends('layout')

@section('content')
    @if (empty($languages))
        <div class="title">No Any Languages Preferred</div>
    @else
        <div class="title">Something Else Here</div>
    @endif

    @foreach ($languages as $language)
    <li>{{ $language }}</li>
    @endforeach
@stop