@extends('layouts.main')

@section('content')
    <h1>Редактирование задачи</h1>

    {{--    @error('title')--}}
    {{--    <div class="alert alert-danger">Title - обязательное поле</div>--}}
    {{--    @enderror--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('put')
        <label for="creator_id">Creator_id</label>
        <br>
        <input id="creator_id" name="creator_id" value="{{$task->creator_id}}">
        <br><br>

        <label for="title">Title</label>
        <br>
        <input id="title" name="title" value="{{$task->title}}">
        <br><br>

        <label for="content">Content</label>
        <br>
        <textarea id="content" name="content" cols="30" rows="10">{{$task->content}}</textarea>
        <br><br>

        <label for="status_id">Status_id</label>
        <br>
        <input id="status_id" name="status_id" value="{{$task->status_id}}">
        <br><br>

        <label for="udated_at">Udated_at</label>
        <br>
        <input id="udated_at" name="udated_at" value="{{date('Y-m-d H:i:s')}}">
        <br><br>

        <input type="submit" value="Сохранить">
        <span style="display: inline-block; width: 100px;"></span>
        <a href="{{route('tasks.index')}}">Вернуться в список задач</a>
    </form>
@endsection



