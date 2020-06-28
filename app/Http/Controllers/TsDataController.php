<?php

namespace App\Http\Controllers;

use App\TsDatum;
use Illuminate\Http\Request;

class TsDataController extends Controller
{
    public function index(){
        $stocks = TsDatum::paginate(10);
        return view('TsData.index',compact('stocks'));
    }
    public function getItems()
  {
    $items = TsDatum::orderBy('id','DESC')->paginate(15);
    return ['items' => $items];
  }
}