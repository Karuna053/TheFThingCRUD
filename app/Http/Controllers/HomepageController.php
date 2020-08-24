<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomepageController extends Controller
{
    public function view(){
        $users = User::get();

        return view('welcome', [
            'users' => $users,
        ]);
    }
}
