<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function spa()
    {
        return view('back.layout.app.app');
    }
}
