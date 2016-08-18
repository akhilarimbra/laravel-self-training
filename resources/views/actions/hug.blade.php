@extends('layouts.master')
@section('title')
Learning Laravel PHP framework for web artisans
@endsection
@section('content')
    <div class="centered">
        <h1>I hugged you</h1>
        <a href="{{ route('niceaction', ['action' => 'greet']) }}">Greet</a>
        <a href="{{ route('niceaction', ['action' => 'hug']) }}">Hug</a>
        <a href="{{ route('niceaction', ['action' => 'kiss']) }}">Kiss</a>
    </div>
@endsection
