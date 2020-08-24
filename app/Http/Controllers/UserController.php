<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;

class UserController extends Controller
{
    public function createUserView(){
        return view('add_user');
    }

    public function createUser(Request $request){
        // Back-end Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'is_married' => 'required',
            'address' => 'required|max:50000'
        ], [
            'name.required' => 'This field is required.',
            'name.max' => 'This field cannot have more than 255 characters.',
            'email.required' => 'This field is required.',
            'email.unique' => 'This email is not available.',
            'password.required' => 'This field is required.',
            'password.confirmed' => 'These passwords do not match.',
            'gender.required' => 'This field is required.',
            'is_married.required' => 'This field is required.',
            'address.required' => 'This field is required.',
            'address.max' => 'This field cPannot have more than 50000 characters.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

        // Saya convert data dari front-end ke JSON di sini, sesuai technical testnya, tapi saya bingung
        // kebutuhannya buat apa. Di PHP kalo butuh format JSON, data dari front-end cukup tinggal pakai
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

        // Building JSON message to flash.
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

        return redirect('/');
    }

    public function updateUserView($id){
        $user = User::find($id);

        return view('update_user', [
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request){
        // Back-end Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$request->id,
            'password' => 'confirmed|nullable',
            'gender' => 'required',
            'is_married' => 'required',
            'address' => 'required|max:50000'
        ], [
            'name.required' => 'This field is required.',
            'name.max' => 'This field cannot have more than 255 characters.',
            'email.required' => 'This field is required.',
            'email.unique' => 'This email is not available.',
            'password.required' => 'This field is required.',
            'password.unique' => 'These passwords do not match.',
            'gender.required' => 'This field is required.',
            'is_married.required' => 'This field is required.',
            'address.required' => 'This field is required.',
            'address.max' => 'This field cPannot have more than 50000 characters.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        }

        // Saya convert data dari front-end ke JSON di sini, sesuai technical testnya, tapi saya bingung
        // kebutuhannya buat apa. Di PHP kalo butuh format JSON, data dari front-end cukup tinggal pakai
        // json_encode. Terus, kalau JSON-nya perlu didecode buat dimasukin ke database, tinggal pakai
        // json_decode.
        $json_request = json_encode($request->all());
        $input = json_decode($json_request);

        // Inserting user data here.
        $user = User::find($input->id);
        $user->name = $input->name;
        $user->email = $input->email;
        $user->gender = $input->gender;
        if ($input->password) $user->password = md5($input->password);
        $user->is_married = $input->is_married;
        $user->address = $input->address;
        $user->save();

        // Building JSON message to flash.
        $json_flash_message = json_encode([
            'status' => [
                'code' => http_response_code(),
                'response' => 'success',
                'message' => 'User has been successfully updated in the database.'
            ],
            'result' => [
                //
            ]
        ]);

        return redirect('/');
    }


    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }
}
