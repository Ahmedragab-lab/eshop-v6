<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // function register(Request $req){
    //     return $req->input();
    // }
    function register(Request $req){
        $users = $req->all();
        $users['password'] = Hash::make($users['password']);
        User::create($users);
        return $users;
    }
}
