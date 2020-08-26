<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChData;
class StockAddController extends Controller
{
    public function index(){
        $stockAdd = ChData::select('ch_data.ch_id','ch_data_size.ch_size','ch_data.ch_url','num')
        ->leftjoin('ch_data_size','ch_data.ch_id','=','ch_data_size.ch_id')
        ->leftjoin('ch_exclude','ch_data.ch_id','=','ch_exclude.ch_id')
        ->leftjoin('tsdata',function($join){
            $join->on('ts_id','=','ch_data_size.ch_id');
            $join->on('tsdata.ts_size','=','ch_data_size.ch_size');
           })
        ->whereNotNull('ch_data_size.ch_size')
        ->whereNull('tsdata.ts_size')
        ->whereIn('ch_data.ch_id',function($query){
               $query->select('ts_id');
               $query->from('tsdata');
               }
           )
        ->whereNotIn('ch_data.ch_id',function($query){
               $query->select('ch_id');
               $query->from('ch_exclude');
           }
           )
           ->paginate();
        return view('StockAdd.index',compact('stockAdd'));
       }
}
