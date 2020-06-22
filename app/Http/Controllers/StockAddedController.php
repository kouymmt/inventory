<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockAddedController extends Controller
{
    public function index(){
     
     $stockAdded = DB::table('ch_data_size')->leftjoin('tsdata','ch_data_size.ch_id','=','ts_id')->join('ch_data','ch_data_size.ch_id','=','ch_data.ch_id')->whereNull('ts_size')->paginate();
     return view('StockAdded.index',compact('stockAdded'));
    }
}

