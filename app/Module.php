<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules_menu';

    protected $fillable = [
        'name', 'url', 'class_icon','parent', 'order', 'enabled', 'class_icon_level'
    ];
    
}
