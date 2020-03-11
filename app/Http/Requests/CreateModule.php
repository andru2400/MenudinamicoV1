<?php
namespace App\Http\Requests;
use Illuminate\Http\Request;
use Validator;

class CreateModule 
{  
    public static function validator(Request $request){
        $rules = [
            'name' =>'required|unique:modules_menu',            
            'enabled' =>'required'
        ];
                
        $messages = [
            'name.required'     => 'El campo Nombre es obligatorio',            
            'name.unique'       => 'El campo Nombre ya se encuentra registrado',            
            'enabled.unique'    => 'El campo Estado, es requerido',            
        ];

        $confirm = Validator::make($request->all(), $rules, $messages);        

        if($confirm->fails())
        {          
           $errors = $confirm->errors();           
            return [
                  'status'=>'ERROR',
                  'message' => '',
                  'errors' => $errors
            ];
        }        

        return false;   
    }
}