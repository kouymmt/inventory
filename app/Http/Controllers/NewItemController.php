<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChData;

class NewItemController extends Controller
{
    public function index(){
     
     $newItem = ChData::select('num','ch_data.ch_id','ch_data.ch_url')
     ->leftjoin('ch_data_size','ch_data.ch_id','=','ch_data_size.ch_id')
     ->leftjoin('ch_data_img','ch_data.ch_id','=','ch_data_img.ch_id')
     ->leftjoin('tsdata','ch_data.ch_id','=','tsdata.ts_id')
     ->leftjoin('ch_exclude','ch_data.ch_id','=','ch_exclude.ch_id')
     ->whereNotNull('ch_data.ch_id')
     ->whereNotNull('ch_data_size.ch_size')
     ->whereNull('tsdata.ts_id')
     ->whereNull('ch_exclude.ch_id')
     ->groupBy('num','ch_data.ch_id','ch_data.ch_url')
     ->paginate();
   
     return view('NewItem.index',compact('newItem'));
    }
}

