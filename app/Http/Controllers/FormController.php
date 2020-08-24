<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function createUser(Request $request){
        $json_request = $this->convertToJSON($request);
        dd($json_request);
    }

    private function convertToJSON($request){
        return json_encode($request->all());
    }
}
