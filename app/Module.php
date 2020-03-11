<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules_menu';

    protected $fillable = [
        'name', 'url', 'class_icon','parent_id', 'order', 'enabled'
    ];
    
    public function modules()
    {
        return $this->hasMany('App\Module', 'parent_id');
    }

}
