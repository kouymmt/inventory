<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\ChData;
use App\ChDataImg;
use App\ChDataSize;

class RestartController extends Controller
{
    public function restart(){
    /** db初期化 */
    $ch_data = new ChData;
    $ch_data->truncate();
    $ch_data_img = new ChDataImg;
    $ch_data_img->truncate();
    $ch_data_size = new ChDataSize;
    $ch_data_size->truncate();    
    //todo 動作中job をkill
    DB::table('jobs')->delete();
    DB::table('ch_data')->delete();
    DB::table('ch_data_img')->delete();
    DB::table('ch_data_size')->delete();
   // DB::table('tsdata')->delete();

    
   // Artisan::call('queue:work');
    return redirect()->route('setting');
}
}