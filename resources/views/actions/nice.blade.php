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
        @if (isset($name) && isset($action))
            <h1>I {{ $action }} {{ $name }} !!!</h1>
        @else
            <h1>I greet you !!!</h1>
        @endif
        <form method="post" action="{{ route('benice') }}">
            <label for="select-action">I want to ...</label>
            <select name="action" id="select-action">
                @foreach ($actions as $action)
                    <option value="{{ $action['name'] }}">{{ $action['name'] }}</option>
                @endforeach
            </select>
            <input type="text" name="name" placeholder="Enter your name"/>
            <input type="submit" value="Perform Action"/>
            <input type="hidden" value="{{ Session::token() }}" name="_token"/>
        </form>
        @foreach ($actions as $action)
            <a href="{{ route('niceaction', ['action' => lcfirst($action['name'])]) }}">{{ $action['name'] }}</a>
        @endforeach
    </div>
@endsection
