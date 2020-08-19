<?php
 
namespace App\Http\Controllers; 

use App\ChData;
use App\ChDataImg;
use App\ChDataSize;
use App\Setting;
use App\Jobs\ScrapingJob;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Goutte\Client;  // Goutte ライブラリの読み込み   

class ScrapingController extends Controller {
   /**     * Display a listing of the resource.    
    **      * @return \Illuminate\Http\Response      
    */
    public function getdata(){
     DB::table('jobs')->delete();
     DB::table('failed_jobs')->delete();  
     $start_page =  Setting::first()->start_page;
     $end_page =  Setting::first()->end_page;
   //   $start_delay = DB::table('settings')->value('start_delay');
   //      sleep($start_delay*60*60);
    for($num = $start_page;$num <= $end_page;$num++){
    ScrapingJob::dispatch($num);
    }
    return redirect()->route('setting');    
   }
   
}

