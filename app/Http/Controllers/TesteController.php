<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function go(Request $request){
        //$x = $request->getAcceptableContentTypes();
        $x = $request->all();
        dd($x);
        //return view ('teste');
        

    }
}
