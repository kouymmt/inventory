<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\Scraper;

class ReScrapeController extends Controller
{
    public function index($num){

        DB::table('ch_data_size')
        ->where('ch_id','=',function($query) use ($num){
            $query->from('ch_data')
            ->select('ch_id')
            ->distinct()
            ->where('num','=',$num);})
            ->delete(); 
        DB::table('ch_data_img')
            ->where('ch_id','=',function($query) use ($num){
            $query->from('ch_data')
            ->select('ch_id')
            ->distinct() 
            ->where('num','=',$num);})
            ->delete();     
        DB::table('ch_data')->where('num','=',$num)->delete();
        $rescrape = app()->make(Scraper::class);
        $rescrape->scrape($num);

        // return redirect()->route('Stockout');
        return redirect()->back();
}
}