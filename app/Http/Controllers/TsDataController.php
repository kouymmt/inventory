<?php

namespace App\Http\Controllers;

use App\TsDatum;
use Illuminate\Http\Request;
// TODO infinit scrollにする
class TsDataController extends Controller
{
    public function index(TsDatum $ts_data){
       // $stocks = $ts_data::all();
        $stocks = TsDatum::paginate(15);
        return view('TsData.index',compact('stocks'));
    }
}