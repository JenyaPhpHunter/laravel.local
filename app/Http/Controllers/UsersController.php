<?php

namespace App\Http\Controllers;

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

    public function show()
    {
        return "method show UsersController";
    }

    public function destroy($id)
    {
        return "delete user" . $id;
    }

}
