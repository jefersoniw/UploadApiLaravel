<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class uploadController extends Controller
{

    public function uploadFotos(Request $request){
        $array = ['error' => ''];

        $rules = [
            'name' => 'required',
            'photo' => 'required|mimes:jpg,png'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $array['error'] = $validator->getMessageBag();
        }

        if($request->file('photo')->isValid()){

            $name = $request->input('name');
            $photo = $request->file('photo');

        }else{

            $array['error'] = "O arquivo não foi enviado.";
        }






        return $array;
    }
}
