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
        <h2>Logs</h2>
        <ul>
            @foreach ($action_logs as $action_log)
                <li>{{ $action_log->nice_action->name }}</li>
            @endforeach
        </ul>
        @foreach ($actions as $action)
            <a href="{{ route('niceaction', ['action' => lcfirst($action['name'])]) }}">{{ $action['name'] }}</a>
        @endforeach
        <h2>Add Action</h2>
        <form method="post" action="{{ route('add_action') }}">
            <label for="select-action">Name of the Action : </label>
            <input type="text" name="name" />
            <br>
            <label for="niceness">Niceness of the Action : </label>
            <input type="number" name="niceness" />
            <br><br>
            <input type="submit" value="Add Action"/>
            <input type="hidden" value="{{ Session::token() }}" name="_token"/>
        </form>
    </div>
@endsection
