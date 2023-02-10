@extends('layouts.main')

@section('content')
    <h1>Создание этикетки</h1>

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
    <form method="post" action="{{ route('labels.store') }}">
        @csrf
        <label for="name">Name</label>
        <br>
        <input id="name" name="name">
        <br><br>

        <label for="color">Color</label>
        <br>
        <input id="color" name="color">
        <br><br>

        <label for="created_at">Created_at</label>
        <br>
        <input id="created_at" name="created_at" value="{{date('Y-m-d H:i:s')}}">
        <br><br>

        <input type="submit" value="Сохранить">
        <span style="display: inline-block; width: 100px;"></span>
        <a href="{{route('labels.index')}}">Вернуться в список задач</a>

    </form>

@endsection


