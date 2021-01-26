<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgressController extends Controller
{
    public function index(){
        $ch_data_num  = DB::table('ch_data')->orderBy('num','desc')->first();

        return view('Progress.index',compact('ch_data_num'));
        
    }
}