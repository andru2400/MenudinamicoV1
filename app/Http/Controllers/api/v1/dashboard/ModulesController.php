<?php

namespace App\Http\Controllers\api\v1\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;

class ModulesController extends Controller
{
    public function parameters(){
        
    }

    public function all(){
        $list = Module::all();
        return response()->json([
            'list' => $list
           ,'status' => 'OK'            
        ]);
    }
}
