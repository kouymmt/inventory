<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ChData;

class PriceCheckController extends Controller
{
    // public function index(){
        
    //     $ch_ts_diff = ChData::join('tsdata','ch_id','=','ts_id',)
    //     ->where('tsdata.show','<>','0')
    //     ->groupBy();
    //     $ch_base_price = $ch_ts_diff->select('ch_id','ch_price')->get();
    //     $ts_base_price = $ch_ts_diff->select('ts_id','ts_base_price')->get();
    //     $ch_price = $ch_ts_diff->select('ch_id','ch_price')->get()->toArray();
    //     $ts_normal_price = $ch_ts_diff->select('ts_id','ts_normal_price')->get()->toArray();
    //     $price_diff = diff($ts_base_price,$ch_base_price);
    



        public function index(){
            $price_diff = ChData::select('ch_id','ts_id','ch_base_price','ts_base_price','ch_price','ts_normal_price','ch_url','show')
            ->join('tsdata','ch_id','=','ts_id',)
            ->where('tsdata.show','<>','0') 
            //->whereColumn('ch_base_price','<>','ts_base_price')
            //->whereColumn('ch_price','<>','ts_normal_price')
            ->groupBy('ch_id','ts_id','ch_base_price','ts_base_price','ch_price','ts_normal_price','ch_url','show')
            ->get();
            
    
            return view('PriceCheck.index',compact('price_diff'));
      }
}
