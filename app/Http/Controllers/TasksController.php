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
        return "index method TasksController class works";
    }

    /**
     * Show the form for creating a new resource.
     * Вывод формі создания сущности
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create method TasksController class works";
    }

    /**
     * Store a newly created resource in storage.
     * Сохранение сущности в хранилище
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "store method TasksController class works";

    }

    /**
     * Display the specified resource.
     * Просмотр одной сущности
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show method TasksController class works with id = " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     * Вывод формы для редактирования сущности
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit method TasksController class works with id = " . $id;
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
        return "update method TasksController class works with id = " . $id;
    }

    /**
     * Remove the specified resource from storage.
     * удаление сущности из хранилища
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destroy method TasksController class works with id = " . $id;
    }
}
