<?php

namespace App\Http\Controllers;
use App\ChExclude;
use Illuminate\Http\Request;

class ExcludeController extends Controller
{
   
        public function register(Request $request){
        //     $exclude = new ChExclude;
        //     $exclude->ch_id = $request->register;
        //  // unset($exclude["_token"]);
        //     $exclude -> save();
        ChExclude::updateOrCreate(['ch_id' => $request->register]);
            return redirect()->route('newItem');
        }
}
