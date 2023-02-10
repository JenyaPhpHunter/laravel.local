@extends('layouts.main')

@section('content')
@foreach($labels as $label)
    <h1>Етикетка № {{$label->id}}</h1>
    <div>
        NAME: <b>{{$label->name}}</b>
        <br>
        COLOR: {{$label->color}}
        <br>
        @foreach($label->tasks as $t)
            <li>
                <h4>
                    TASK: {{$t->title}}
                </h4>
            </li>
        @endforeach
        @endforeach
        <br>
        <hr>
    </div>
    <div>
{{--        Created by {{$task->name}}--}}
    </div>
    <hr>
    <br>
    <a href="{{route('labels.index')}}">Вернуться в список задач</a>
    <br><br><br>
    <form id="delete-form" method="post">
        @csrf
        @method('delete')
        <a href="{{ route('labels.destroy', ['label' => $label->id]) }}" onclick="document.getElementById('delete-form').submit(); return false;">Удалить</a>
    </form>

@endsection

