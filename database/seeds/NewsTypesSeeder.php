<?php

use Illuminate\Database\Seeder;

class NewsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_types')->insert([
            
            ['id' => '1','name' => 'general'],      
        	['id' => '2','name' => 'ambiental.'],      
        	['id' => '3','name' => 'científico.'],
        	['id' => '4','name' => 'ciudadano'],
            ['id' => '5','name' => 'cultural.'],        	
            ['id' => '6','name' => 'guerra'],        	
            ['id' => '7','name' => 'investigación'],        	
            ['id' => '8','name' => 'corazón.'],        	
            ['id' => '9','name' => 'declarativo.'],        	
            ['id' => '10','name' => 'deportivo.'],        	
            ['id' => '11','name' => 'económico.'],        	
            ['id' => '12','name' => 'local'],        	
            ['id' => '13','name' => 'infográfico.'],        	
            ['id' => '14','name' => 'literario.'],        	
            ['id' => '15','name' => 'político'],        	
            ['id' => '16','name' => 'móvil.'],        	
            ['id' => '17','name' => 'preventivo.'],        	
            ['id' => '18','name' => 'satírico'],        	
            ['id' => '19','name' => 'social. '],                         
                        
        ]);    
    }
}
