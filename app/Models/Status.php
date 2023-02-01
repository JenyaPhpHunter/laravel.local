<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
//    protected $table = 'statuses';
//    protected $primaryKey = 'name';
//public const CREATED_AT = "created date";
    public function tasks()
    {
        return $this->HasMany(Task::class);
    }
}
