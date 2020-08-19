<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TsDatum;
class SearchController extends Controller
{
    public function getData(Request $request){
        $keyword = $request->input('search');
        $result = TsDatum::where('ts_id','like','%'.$keyword.'%')
        ->orWhere('product_id','like',$keyword)
        ->get();
        return view('TsData.search_result',compact('result')); 
    }
}
