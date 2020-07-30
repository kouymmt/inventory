<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TsDatum;

class StockoutController extends Controller
{
    public function index(){
     $stockout = TsDatum::select()
     ->leftjoin('ch_data','ch_data.ch_id','=','ts_id')
     ->leftjoin('ch_data_size',function($join){
         $join->on('ts_id','=','ch_data_size.ch_id');
         $join->on('tsdata.ts_size','=','ch_data_size.ch_size');
        })
        ->whereNull('ch_data_size.ch_size')
        ->where('tsdata.stock','!=','0')
        ->paginate();
     return view('Stockout.index',compact('stockout'));
    }
}

