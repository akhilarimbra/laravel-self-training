@extends('layouts.master')
@section('title')
Learning Laravel PHP framework for web artisans
@endsection
@section('content')
    <div class="centered">
        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
        @if (isset($action))
            <h1>I {{ $action }} YOU !!!</h1>
        @else
            <h1>I greet you !!!</h1>
        @endif
        <form method="post" action="{{ route('benice') }}">
            <label for="select-action">I want to ...</label>
            <select name="action" id="select-action">
                <option value="greet">Greet</option>
                <option value="hug">Hug</option>
                <option value="kiss">Kiss</option>
                <option value="wave">Wave</option>
            </select>
            <input type="text" name="name" placeholder="Enter your name"/>
            <input type="submit" value="Perform Action"/>
            <input type="hidden" value="{{ Session::token() }}" name="_token"/>
        </form>
        <a href="{{ route('niceaction', ['action' => 'greet']) }}">Greet</a>
        <a href="{{ route('niceaction', ['action' => 'hug']) }}">Hug</a>
        <a href="{{ route('niceaction', ['action' => 'kiss']) }}">Kiss</a>
        <a href="{{ route('niceaction', ['action' => 'wave']) }}">Wave</a>
    </div>
@endsection
