<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomepageController extends Controller
{
    public function view($json_flash_message = null){
        $users = User::get();

        if ($json_flash_message){
            return view('welcome', [
                'users' => $users,
                'json_flash_message' => $json_flash_message,
            ]);
        }
        else {
            return view('welcome', [
                'users' => $users,
            ]);
        }
    }
}
