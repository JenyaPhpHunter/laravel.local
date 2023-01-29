<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function registration()
    {
        return "Открылась форма регистрации";
    }

    public function authorization()
    {
        return "Открылась форма авторизации";
    }

    public function index()
    {
        $users = DB::table('users')
            ->select(['users.id','users.name','users.email','tasks.title','tasks.content'])
            ->join('tasks','users.id', '=', 'tasks.creator_id')
            ->orderBy('id','desc')
            ->get();
        return "<pre>" . print_r($users,true) . "</pre>";
    }

    public function show($id)
    {
        $user = DB::table('users')->select('name','email')->where('id',$id)->first();
        return "<pre>" . print_r($user,true) . "</pre>";
    }

    public function destroy($id)
    {
        DB::table('users')->delete($id);
    }

}
