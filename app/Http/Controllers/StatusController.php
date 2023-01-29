<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $statuses = DB::table('statuses')->select('name')->orderBy('id','desc')->get();
//        return "<pre>" . print_r($statuses,true) . "</pre>";
        $statuses = Status::query()->with('tasks')->orderBy('id','desc')->get();
        $statuses->each(function($status){
            $name = $status->name;
            echo "Name status = " . $name . "<br>";
            foreach ($status->tasks as $task) {
                echo "CONTENT IS " . $task->content . "<br>";
            }
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $status = DB::table('statuses')->where('id',$id)->first();
//        return "<pre>" . print_r($status,true) . "</pre>";
        $status = Status::query()->where('id', $id)->first();
        $name = $status->name;
        $tasks = $status->tasks;
        echo "Name status = " . $name . "<br>";
        foreach ($tasks as $task) {
            echo "Title with Status " . $id . " = " .$task->title . "<br>";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        DB::table('statuses')->delete($id);
        Status::destroy($id);
    }

}
