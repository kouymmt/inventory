<?php

namespace App\Http\Controllers;

use App\TsDatum;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use League\Csv\Reader;
// use League\Csv\Statement;
// use League\Csv\CharsetConverter;

class CsvImportController extends Controller
{
  public function index(){
    return view('CsvImport.index');
  }

  // public function CsvImport(Request $request, Statement $stmt, TsDatum $ts_data){
    // $ts_data::truncate();
    // $file_path = $request->file('file')->getPathname();
    // $csv = Reader::createFromPath($file_path, 'r')->setHeaderOffset(0);
    // CharsetConverter::addTo($csv, 'SJIS-win', 'UTF-8');
    // $records = $stmt->process($csv);
    // $header=$records->getHeader();
    // //var_dump($header);
    // foreach ($records as $record) {
    //  $data['product_id']=$record['商品ID'];    
    //  $data['ts_id']=$record['商品コード'];
    //  $data['ts_size']=$record['規格分類名'];
    //  $data['ts_base_price']=$record['通常価格'];
    //  $data['ts_normal_price']=$record['販売価格']; 
    //  var_dump($record);    //読みこむ行と読み込まない行が混在している
    //  league\csvは不安定と判断し、導入を取りやめる。  
    //}
  public function CsvImport(Request $request,  TsDatum $ts_data){
    DB::table('tsdata')->truncate();
    $ts_data->GetCsv($request);
    
    
    
    return redirect()->route('setting')->with('message','現状在庫を読み込みました'); 
  //TODO リンクを作成する。
  //return redirect()->route('setting')->with('message',  　HTML::linkRoute('tallsecretStock', '現状在庫を読み込みました'));

}
}
