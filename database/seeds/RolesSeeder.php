<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            
            ['id' => '1','name' => 'Periodista.','description' => 'Es el encargado de ...'],      
        	['id' => '2','name' => 'Periodista ambiental.','description' => 'Es el encargado de ...'],      
        	['id' => '3','name' => 'Periodista científico.','description' => 'Es el encargado de ...'],
        	['id' => '4','name' => 'Periodista ciudadano','description' => 'Es el encargado de ...'],
            ['id' => '5','name' => 'Periodista cultural.','description' => 'Es el encargado de ...'],        	
            ['id' => '6','name' => 'Periodista de guerra','description' => 'Es el encargado de ...'],        	
            ['id' => '7','name' => 'Periodista de investigación','description' => 'Es el encargado de ...'],        	
            ['id' => '8','name' => 'Periodista del corazón.','description' => 'Es el encargado de ...'],        	
            ['id' => '9','name' => 'Periodista declarativo.','description' => 'Es el encargado de ...'],        	
            ['id' => '10','name' => 'Periodista deportivo.','description' => 'Es el encargado de ...'],        	
            ['id' => '11','name' => 'Periodista económico.','description' => 'Es el encargado de ...'],        	
            ['id' => '12','name' => 'Periodista hiperlocal','description' => 'Es el encargado de ...'],        	
            ['id' => '13','name' => 'Periodista infográfico.','description' => 'Es el encargado de ...'],        	
            ['id' => '14','name' => 'Periodista literario.','description' => 'Es el encargado de ...'],        	
            ['id' => '15','name' => 'Periodista político','description' => 'Es el encargado de ...'],        	
            ['id' => '16','name' => 'Periodista móvil.','description' => 'Es el encargado de ...'],        	
            ['id' => '17','name' => 'Periodista preventivo.','description' => 'Es el encargado de ...'],        	
            ['id' => '18','name' => 'Periodista satírico','description' => 'Es el encargado de ...'],        	
            ['id' => '19','name' => 'Periodista social. ','description' => 'Es el encargado de ...'],   
            ['id' => '20','name' => 'Jefe coordinador.','description' => 'Es el encargado de ...'],
            ['id' => '21','name' => 'Camarografo.','description' => 'Es el encargado de ...'],
            ['id' => '22','name' => 'Conductor.','description' => 'Es el encargado de ...'],
            ['id' => '23','name' => 'Logistico.','description' => 'Es el encargado de ...'],
            ['id' => '24','name' => 'Editor de contenido digital.','description' => 'Es el encargado de ...'],            
            
        ]);    
    }
}