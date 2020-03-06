<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150)->unique();
            $table->string('url', 250)->nullable();
            $table->string('class_icon', 250)->nullable();
            $table->unsignedInteger('parent')->default(0)->nullable();
            $table->unsignedInteger('order')->default(0)->nullable();
            $table->enum('enabled',['activated','inactivated'])->default('activated');
            $table->enum('class_icon_level',['1','2','3'])->default('1')->nullable();            
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules_menu');
    }
}
