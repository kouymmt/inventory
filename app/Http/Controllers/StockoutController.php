<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockoutController extends Controller
{
    public function index(){
     $stockout =  DB::table('tsdata')->join('ch_data','ts_id','=','ch_data.ch_id')->leftJoin('ch_data_size','ts_id','=','ch_data_size.ch_id')->whereNull('ch_size')->paginate();
     return view('Stockout.index',compact('stockout'));
    }
}

