<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for($i=0;$i<10;$i++){
//            DB::table('statuses')->insert([
//                'name' => Str::random(7)
//            ]);
//        }
        for($i=0;$i<10;$i++){
            $entity = new Status();
            $entity->name = Str::random(7);
            $entity->save();
        }
    }
}
