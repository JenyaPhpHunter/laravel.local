  @extends('layouts.main')

  @section('content')
      @php
          $name = 'Список етикеток';
      @endphp
    <h1>{{$name}}</h1>
<br><br>
          <a href="{{ route('labels.create') }}">Создать этикетку</a>

    <div>
    <ul>
        @foreach($labels as $label)
            <li>
                <h4>
                    Name: <a href="{{route('labels.show', ['label' => $label->id])}}">{{$label->name}}</a>
                </h4>
                Color: {{$label->color}}
                <br>
                <h4>
                Tasks with this label:
                </h4>

                @foreach($label->tasks as $task)
                    <a href="{{route('tasks.show', ['task' => $task->id])}}">{{$task->title}}</a>
                    <br>
                @endforeach
                <br>
                <a href="{{ route('labels.edit',['label' => $label->id])}}">Редактировать задачу</a>
                <hr>
            </li>
        @endforeach
    </ul>
</div>
  @endsection

