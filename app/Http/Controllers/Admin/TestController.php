<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function teste(){
        return 'Teste Controller';
    }

    public function grava(){
        return 'Gravando....';
    }
}
