<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function tasks()
    {
        return $this->belongsToMany(Task::class,'task_label');
//            ->join('task_label', 'task_label.task_id', '=', 'tasks.id');
//        return $this->belongsToMany(Task::class)->using(Label::class);
    }
}
