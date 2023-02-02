<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     * Список сущностей
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $tasks = DB::table('tasks')
//            ->select(['tasks.id','tasks.creator_id','tasks.title','tasks.content','tasks.status_id','users.name'])
//            ->join('users','users.id', '=', 'tasks.creator_id')
//            ->orderBy('id','desc')
//            ->get();
//        return "<pre>" . print_r($tasks,true) . "</pre>";

//        $tasks = Task::query()->with('status')->orderBy('id', 'desc')->get();
//        foreach($tasks as $task){
//            echo "Title = " . $task->title . "<br>" . "Content = " . $task->content . "<br>";
//            echo "Имя статуса - " . $task->status->name . "<br>";
//            foreach ($task->labels as $label){
//                echo "Color Label - " . $label->color . "<br>";
//            }
//        }
        $tasks = Task::query()->with('status')->orderBy('id', 'desc')->get();
        $hello = 'Hello';
        return view('tasks.index',[
            'tasks' => $tasks,
            "hello" => $hello
        ]);

    }

    /**
     * Show the form for creating a new resource.
     * Вывод формі создания сущности
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     * Сохранение сущности в хранилище
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make([
//            $request->post('creator_id'),
//            $request->post('title'),
//            $request->post('content'),
//            $request->post('status_id')], [
//            'creator_id' => 'required',
//            'title' => 'required|unique:tasks|max:255',
//            'content' => 'required',
//            'status_id' => 'required',
//            'created_at' => 'nullable|timestamp',
//        ], $messages = [
//            'required' => ':attribute является обязательным полем.',
//        ]);

        $validated = $request->validate([
            'creator_id' => 'required',
            'title' => 'required|unique:tasks|max:15|alpha_dash:ascii',
            'content' => 'required',
            'status_id' => 'required',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $task = new Task();
        $task->creator_id = $request->post('creator_id');
        $task->title = $request->post('title');
        $task->content = $request->post('content');
        $task->status_id = $request->post('status_id');
        $task->created_at = $request->post('created_at');

        $task->save();

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     * Просмотр одной сущности
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $task = DB::table('tasks')->where('id',$id)->first();
//        return "<pre>" . print_r($task,true) . "</pre>";

//        $task = Task::query()
//            ->select(['tasks.id', 'tasks.creator_id','tasks.title','tasks.content','users.name'])
//            ->join('users','users.id', '=', 'tasks.creator_id')
//            ->where('tasks.id',$id)->first();
//        $title = $task->title;
//        $content = $task->content;
//        $creator_name = $task->name;
//        echo "creator name = " . $creator_name . "<br>" .
//            "title = " . $title . "<br>" .
//            "content = " . $content . "<br>";
        $task = Task::query()
            ->select(['tasks.id', 'tasks.creator_id','tasks.title','tasks.content','users.name'])
            ->join('users','users.id', '=', 'tasks.creator_id')
            ->where('tasks.id',$id)->first();
        return view('tasks.show',[
            'task' => $task
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     * Вывод формы для редактирования сущности
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::query()->where('id',$id)->first();
        if(!$task){
            throw new \Exception('Task not found');
        }
        return view('tasks.edit', ['task' => $task]);
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
        $validated = $request->validate([
            'creator_id' => 'required',
            'title' => 'required|unique:tasks|max:15|alpha_dash:ascii',
            'content' => 'required',
            'status_id' => 'required',
            'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $task = Task::query()->where('id',$id)->first();
        $task->creator_id = $request->post('creator_id');
        $task->title = $request->post('title');
        $task->content = $request->post('content');
        $task->status_id = $request->post('status_id');
        $task->updated_at = $request->post('updated_at');

        $task->save();

        return redirect( route('tasks.show', ['task' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     * удаление сущности из хранилища
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::query()->where('id',$id)->delete();
        return redirect( route('tasks.index'));
    }
}
