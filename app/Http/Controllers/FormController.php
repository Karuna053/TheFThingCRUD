<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FormController extends Controller
{
    public function createUser(Request $request){
        // Saya convert data dari front-end disini, ke JSON sesuai technical testnya, tapi saya bingung
        // kebutuhannya buat apa. Di PHP kalo butuh format JSON, data dari front-end cukup tinggal pake
        // json_encode. Terus, kalau JSON-nya mau dimasukin ke database, tinggal decode pake json_decode.
        $json_request = json_encode($request->all());
        $input = json_decode($json_request);

        $user = New User;
        $user->name = $input->name;
        $user->email = $input->email;
        $user->password = md5($input->password);
        $user->gender = $input->gender;
        $user->is_married = $input->is_married;
        $user->address = $input->address;
        $user->save();

        return dd($user);
    }

    private function convertToJSON($request){
        return json_encode($request->all());
    }
}
