<?php

namespace App\Http\Controllers\api\v1\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Http\Requests\CreateModule;
use App\Http\Requests\EditModule;

class ModulesController extends Controller
{
    public function parameters(){
        $modules = Module::all();
        return response()->json(['status' => 'OK',
                                'parameters' => [
                                    'modules_disorder' => $modules,                                   
                                  ]
                                ]);
    }

    public function all(){
        $list = Module::where('parent_id',null)->orderBy('order','ASC')->with(['modules' => function($query){
            $query->with('modules')->orderBy('order','ASC');
        }])->get();
        
        return response()->json([
            'list' => $list
           ,'status' => 'OK'            
        ]);
    }

    public function store(Request $request){

        $confirm = CreateModule::validator($request);  
        if($confirm){
            return response()->json($confirm);
        }        

        $module = new Module();
        $module->name = $request->name;

        if(!$request->url){
            $module->url  = '#';
        }else{
            $module->url = $request->url;
        }

        if($request->class_icon == 'null'){
            $module->class_icon = null;
        }else{
            $module->class_icon = $request->url;
        }

        if($request->parent_id == 'null'){
            $module->parent_id = null;
        }else{
            $module->parent_id = $request->parent_id;
        }

        $order_default = Module::orderBy('order','DESC')->where('parent_id',$module->parent_id)->first();
        if($order_default){
            $module->order = $order_default->order + 1;
        }else{
            $module->order = 0;
        }        

        $module->enabled = $request->enabled;
        $result = $module->save();

        if($result){
            return response()->json([
                'message' => 'Creado con exito'
               ,'status' => 'OK'            
            ]);
        }else{
            return response()->json([
                'message' => 'Error al guardar'
               ,'status' => 'ERROR'            
            ]);
        }                
    }

    public function update(Request $request){        

        $confirm = EditModule::validator($request);  
        if($confirm){
            return response()->json($confirm);
        }        

        $module = Module::find($request->id);
        if($module){                     

            $module->name = $request->name;

            if(!$request->url){
                $module->url  = '#';
            }else{
                $module->url = $request->url;
            }

            if($request->class_icon == 'null'){
                $module->class_icon = null;
            }else{
                $module->class_icon = $request->url;
            }

            if($request->parent_id == 'null'){
                $module->parent_id = null;
            }else{
                $module->parent_id = $request->parent_id;
            }            

            $module->enabled = $request->enabled;
            $result = $module->update();

            if($result){
                return response()->json([
                    'message' => 'Actualizado con exito'
                ,'status' => 'OK'            
                ]);
            }else{
                return response()->json([
                    'message' => 'Error al Actualizar'
                ,'status' => 'ERROR'            
                ]);
            }                
        }    
        
        return response()->json([
            'message' => 'Error al encontrar el elemento'
            ,'status' => 'ERROR'            
        ]);
    }

    public function destroy($id){  
        
        $module = Module::with('modules')->find($id);        
        if($module){
            if(count($module->modules) > 0){
                return response()->json([
                    'message' => 'No se puede eliminar, primero elimine hijos'
                    ,'status' => 'ERROR'            
                ]);
            }else{
                $result = $module->delete();
                if($result){
                    return response()->json([
                        'message' => 'Se elimino elemento con exito.'
                        ,'status' => 'OK'            
                    ]);
                }                
            }
        }
        return response()->json([
            'message' => 'No se encontro el elemento, refresqué e intente de nuevo'
            ,'status' => 'ERROR'            
        ]);
    }
}
