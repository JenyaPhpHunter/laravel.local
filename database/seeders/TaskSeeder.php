<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//      for($i=0;$i<10;$i++){
//          DB::table('tasks')->insert([
//              'creator_id' => rand(1,7),
//              'title' => Str::random(7),
//              'content' => Str::random(20),
//              'status_id' => rand(1,7)
//          ]);
//      }
        for($i=0;$i<10;$i++){
            $entity = new Task();
            $entity->creator_id = rand(1,7);
            $entity->title = Str::random(7);
            $entity->content = Str::random(20);
            $entity->status_id = rand(1,7);
            $entity->save();
        }

    }
}
