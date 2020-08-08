<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ChData;

class PriceCheckController extends Controller
{
    public function index(){
        $price_diff = ChData::select('ch_id','ts_id','ch_base_price','ts_base_price','ch_price','ts_normal_price','ch_url','stock')
        ->join('tsdata','ch_id','=','ts_id',)
        ->where('tsdata.stock','<>','0') 
        ->whereColumn('ch_base_price','<>','ts_base_price')
        ->whereColumn('ch_price','<>','ts_normal_price')
        ->groupBy('ch_id','ts_id','ch_base_price','ts_base_price','ch_price','ts_normal_price','ch_url','stock')
        ->get();
        
        
        return view('PriceCheck.index',compact('price_diff'));
}
}