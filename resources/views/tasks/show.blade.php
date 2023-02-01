@extends('layouts.main')

@section('content')
    <h1>Задача № {{$task->id}}</h1>
    <div>
        NAME: <b>{{$task->title}}</b>
        <br>
        CONTENT: {{$task->content}}
        <br>
        <hr>
    </div>
    <div>
        Created by {{$task->name}}
    </div>
    <hr>
    <br>
    <a href="{{route('tasks.index')}}">Вернуться в список задач</a>
    <br><br><br>
    <form id="delete-form" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}" onclick="document.getElementById('delete-form').submit(); return false;">Удалить</a>
    </form>


@endsection

