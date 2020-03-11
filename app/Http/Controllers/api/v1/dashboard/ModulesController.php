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
            $query->with(['modules' => function($query2){
                $query2->with('modules')->orderBy('order','ASC');
            }])->orderBy('order','ASC');
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

    public function order_up(Request $request){        
        $module = Module::find($request->id);
        if($module){
            $modules = Module::where('parent_id',$module->parent_id)->orderBy('order','ASC')->get();
            $array_reverse = array_reverse($modules->toArray());            
            for ($i=0; $i < count($array_reverse) ; $i++) { 
                if($array_reverse[$i]['id'] == $module->id){                    
                    $capture_index = $i;                    
                }
            }
            if(isset($array_reverse[$capture_index+1])){
                $module_id_exchange = $array_reverse[$capture_index+1];
                $module2 = Module::where('id',$module_id_exchange['id'])->first();                
                $temp_order_module2 = $module2->order;
                $temp_order_module  = $module->order;                 
                $module2->order = $temp_order_module;
                $module->order  = $temp_order_module2;
                $module->update();
                $module2->update();
                return response()->json([
                    'message' => 'Subio de posición exitosamente !'
                    ,'status' => 'OK'            
                ]);
            }else{
                return response()->json([
                    'message' => 'Esta en el primer orden del contenedor!'
                    ,'status' => 'ERROR'            
                ]);
            }
        }
    }

    public function order_down(Request $request){
        $module = Module::find($request->id);
        if($module){
            $modules = Module::where('parent_id',$module->parent_id)->orderBy('order','ASC')->get();
            // $array_reverse = array_reverse($modules->toArray());            
            $array_normal = $modules->toArray();            
            for ($i=0; $i < count($array_normal) ; $i++) { 
                if($array_normal[$i]['id'] == $module->id){                    
                    $capture_index = $i;                    
                }
            }
            if(isset($array_normal[$capture_index+1])){                
                $module_id_exchange = $array_normal[$capture_index+1];
                $module2 = Module::where('id',$module_id_exchange['id'])->first();                
                $temp_order_module2 = $module2->order;
                $temp_order_module  = $module->order;                 
                $module2->order = $temp_order_module;
                $module->order  = $temp_order_module2;
                $module->update();
                $module2->update();
                return response()->json([
                    'message' => 'Bajo de orden exitosamente !'
                    ,'status' => 'OK'            
                ]);
            }else{
                return response()->json([
                    'message' => 'Esta en el ultimo orden de su contenedor!'
                    ,'status' => 'ERROR'            
                ]);
            }
        }
    }
}
