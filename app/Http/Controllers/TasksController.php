<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     * Список сущностей
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Отображает список всех сущностей";
    }

    /**
     * Show the form for creating a new resource.
     * Вывод формі создания сущности
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Вывод формы создания сущности";
    }

    /**
     * Store a newly created resource in storage.
     * Сохранение сущности в хранилище
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "Сохранение сущности в хранилище";

    }

    /**
     * Display the specified resource.
     * Просмотр одной сущности
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "просмотр одной сущносте у которой id = " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     * Вывод формы для редактирования сущности
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "открывается фотрма редактирования сущности у которой id = " . $id;
    }

    /**
     * Update the specified resource in storage.
     * Обновление сущности в хранилище
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "обновление сущности у которой id = " . $id . "в хранилище";
    }

    /**
     * Remove the specified resource from storage.
     * удаление сущности из хранилища
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "удаление сущности у которой id = " . $id . "из хранилища";
    }
}
