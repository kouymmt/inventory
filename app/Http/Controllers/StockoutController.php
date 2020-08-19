<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TsDatum;

class StockoutController extends Controller
{
    public function index(){
     $stockout = TsDatum::select()
     ->join('ch_data','ch_data.ch_id','=','ts_id')
    // ->leftjoin('ch_exclude','ch_data.ch_id','=','ch_exclude.ch_id')
     ->leftjoin('ch_data_size',function($join){
         $join->on('ts_id','=','ch_data_size.ch_id');
         $join->on('tsdata.ts_size','=','ch_data_size.ch_size');
        })
     ->whereNull('ch_data_size.ch_size')
     ->where('tsdata.show','!=','0')
        // ->whereNotIn('ch_data.ch_id',function($query){
        //     $query->select('ch_id');
        //     $query->from('ch_exclude');
        // })
        ->paginate();
     return view('Stockout.index',compact('stockout'));
    }
}

