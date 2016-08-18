@extends('layouts.master')
@section('title')
Learning Laravel PHP framework for web artisans
@endsection
@section('content')
    <div class="centered">
        @if (isset($name))
            <h1>I greet {{ $name }} !!!</h1>
        @else
            <h1>I greet you !!!</h1>
        @endif
        <a href="{{ route('niceaction', ['action' => 'greet']) }}">Greet</a>
        <a href="{{ route('niceaction', ['action' => 'hug']) }}">Hug</a>
        <a href="{{ route('niceaction', ['action' => 'kiss']) }}">Kiss</a>
    </div>
@endsection
 