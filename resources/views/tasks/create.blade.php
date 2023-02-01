@extends('layouts.main')

@section('content')
    <h1>Создание задачи</h1>
    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <label for="creator_id">Creator_id</label>
        <br>
        <input id="creator_id" name="creator_id">
        <br><br>

        <label for="title">Title</label>
        <br>
        <input id="title" name="title">
        <br><br>

        <label for="content">Content</label>
        <br>
        <textarea id="content" name="content" cols="30" rows="10"></textarea>
        <br><br>

        <label for="status_id">Status_id</label>
        <br>
        <input id="status_id" name="status_id">
        <br><br>

        <input type="submit" value="Сохранить">

    </form>

@endsection


