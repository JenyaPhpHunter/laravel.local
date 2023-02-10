<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::all();

        return view('labels.index',[
            'labels' => $labels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $label = new Label();
        $label->name = $request->post('name');
        $label->color = $request->post('color');

        $label->save();

        return redirect(route('labels.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $labels = Label::query()
//            ->select(['labels.id', 'labels.name','labels.color','tasks.title','tasks.content'])
            ->join('task_label','labels.id', '=', 'task_label.label_id')
            ->join('tasks','tasks.id', '=', 'task_label.task_id')
            ->where('labels.id',$id)
            ->get();
        return view('labels.show',[
            'labels' => $labels
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $label = Label::query()->where('id',$id)->first();
        if(!$label){
            throw new \Exception('Label not found');
        }
        return view('labels.edit', ['label' => $label]);
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
        $label = Label::query()->where('id',$id)->first();
        $label->name = $request->post('name');
        $label->color = $request->post('color');

        $label->save();

        return redirect( route('labels.show', ['label' => $id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('labels')->delete($id);
    }
}
