  @extends('layouts.main')

  @section('content')
      @php
          $name = 'Список задач';
      @endphp
    <h1>{{$name}}</h1>
<br><br>
          <a href="{{ route('tasks.create') }}">Создать задачу</a>

    <div>
    <ul>
        @foreach($tasks as $task)
            <li>
                <h4>
                    Title: <a href="{{route('tasks.show', ['task' => $task->id])}}">{{$task->title}}</a>
                </h4>
                Content: {{$task->content}}
                <br>
                Status task: {{$task->status->name}}
                <br>
{{--                @if(isset($task->created_at))--}}
                @isset($task->created_at)
                    Created: {{$task->created_at}}
                    <br>
                @endisset
{{--                @endif--}}
                <a href="{{ route('tasks.edit',['task' => $task->id])}}">Редактировать задачу</a>
                <hr>
            </li>
        @endforeach
    </ul>
</div>
  @endsection

