<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class UserController extends Controller
{
    public function userList(Request $request)
    {
        $users = User::paginate(2);
        return view('users', compact('users'));
    }
}
