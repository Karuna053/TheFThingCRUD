<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FormController extends Controller
{
    public function createUser(Request $request){
        // Saya convert data dari front-end ke JSON di sini, sesuai technical testnya, tapi saya bingung
        // kebutuhannya buat apa. Di PHP kalo butuh format JSON, data dari front-end cukup tinggal pakao
        // json_encode. Terus, kalau JSON-nya perlu didecode buat dimasukin ke database, tinggal pakai
        // json_decode.
        $json_request = json_encode($request->all());
        $input = json_decode($json_request);

        // Inserting user data here.
        $user = New User;
        $user->name = $input->name;
        $user->email = $input->email;
        $user->password = md5($input->password);
        $user->gender = $input->gender;
        $user->is_married = $input->is_married;
        $user->address = $input->address;
        $user->save();

        $json_flash_message = json_encode([
            'status' => [
                'code' => http_response_code(),
                'response' => 'success',
                'message' => 'User has been successfully added to the database.'
            ],
            'result' => [
                //
            ]
        ]);

        return dd($return_message, $user);
    }

    private function convertToJSON($request){
        return json_encode($request->all());
    }
}
