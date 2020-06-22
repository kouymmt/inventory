<?php
 
namespace App\Http\Controllers; 

use App\ChData;
use App\ChDataImg;
use App\ChDataSize;
use App\Jobs\ScrapingJob;


use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Goutte\Client;  // Goutte ライブラリの読み込み   


class ScrapingController extends Controller {
   /**     * Display a listing of the resource.    
    **      * @return \Illuminate\Http\Response      
    */
    public function getdata(){
    
    ScrapingJob::dispatch();
    return redirect()->route('setting');
   }
}

