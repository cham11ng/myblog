@extends('layouts.front')
@section('title', ' | about')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>About Me</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis aspernatur quas quibusdam veniam sunt animi, est quos optio explicabo deleniti inventore unde minus, tempore enim ratione praesentium, cumque, dolores nesciunt?</p>
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
        </div>
    </div>
@stop