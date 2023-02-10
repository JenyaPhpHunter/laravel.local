@extends('layouts.main')

@section('content')
    <h1>Редактирование задачи</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('labels.update', ['label' => $label->id]) }}">
        @csrf
        @method('put')
        <label for="name">Name</label>
        <br>
        <input id="name" name="name" value="{{$label->name}}">
        <br><br>

        <label for="color">Color</label>
        <br>
        <input id="color" name="color" value="{{$label->color}}">
        <br><br>

        <input type="submit" value="Сохранить">
        <span style="display: inline-block; width: 100px;"></span>
        <a href="{{route('labels.index')}}">Вернуться в список задач</a>
    </form>
@endsection



