@extends('layout')

@section('content')
    @if (empty($languages))
        <header class="title">No Any Languages Preferred</header>
    @else
        <header class="title">About Some Languages</header>
    @endif
    <ul>
        @foreach ($languages as $language)
        <li>{{ $language }}</li>
        @endforeach
    </ul>
@stop