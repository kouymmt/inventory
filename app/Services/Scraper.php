<?php
namespace App\Services;

use App\ChData;
use App\ChDataImg;
use App\ChDataSize;
use App\Setting;


use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use Goutte\Client;  // Goutte ライブラリの読み込み   

class Scraper
{
   public function scrape($num){    
      
      $url = "http://www.zgshoes.com/goods-$num.html";
      /** Goutte ライブラリの事前準備 */                              
      $client = new Client(); 
      /** リファラー偽装 */
      $agents = [
         'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C)',
         'Mozilla/5.0 (iPhone; CPU iPhone OS 8_3 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) Version/8.0 Mobile/12F70 Safari/600.1.4',
         'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
         'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'
      ];
      $agent = $agents[array_rand($agents)];
      $client->setHeader('User-Agent', $agent);
      
      // $guzzleClient = new \GuzzleHttp\Client(['verify' => false]);// Https 関連でエラーが発生する場合があるので、チェックしないように設定 
      // $client->setClient($guzzleClient);
   
      // 検索結果の取得
      $attempt = 0;
        if($client->request('GET', $url) != null){
             $crawler = $client->request('GET', $url);
        } else {
            do {
               try{
                  $crawler = $client->request('GET', $url);
               }catch(\InvalidArgumentException $e){
                  $attempt++;
                  sleep(5);
                  break;
               }
            }  while ($attempt <= 3);
         }
      
       $textInfo = $crawler->filterXPath('//*[@id="goodsInfo"]/div[2]');
       if($textInfo->count() === 0){
          echo "no data!";
       }else{
       /** ch_id */
         switch(preg_match('/(?<=商品货号：)[0-9a-zA-Z-]+/',$textInfo->text(),$match)){
         case 0:
         case false:
         $ch_id = "";
         $error_flg = 0;
         break;
         case 1:
         $ch_id = $match[0];
         $error_flg = 1;
         break;
         }
         /** ch_base_price */                      
         switch(preg_match('/(?<=市场价).*会 员 价/',$textInfo->text(),$match)){
            case 0:
            case false:
            $ch_base_price = "";
            $error_flg = 0;
            break;
            case 1:
            $ch_base_price = preg_replace('/[^0-9]/', '', $match[0]);
            $error_flg = 1;
            break;
         }
         
      
         /** ch_price */
         switch(preg_match('/(?<=本店价：).*市场价/',$textInfo->text(),$match)){
            case 0:
            case false:
            $ch_price = "";
            $error_flg = 0;
            break;
            case 1:
            $ch_price = preg_replace('/[^0-9]/', '', $match[0]);
            $error_flg = 1;
            break;
         }
         
         /**ch_data */
         $ch_data = new ChData; 
         $data = ['ch_id' => $ch_id,
                  'ch_base_price' => $ch_base_price,
                  'ch_price' => $ch_price,
                  'ch_url' => $url,
                  'num' => $num,
                  'error_flg' => $error_flg];
         $ch_data->fill($data)->save();
         //$ch_data->updateOrCreate(['error_flg' => 1],$data);
      
      
      



         /** ch_data_img */
         $crawler->filterXPath('//*[@id="goods_gallery"]/li[*]/a/img')->each(function ($node) use (&$img_urls){
            $img_urls[] = $node->image()->getUri(); 
         });
         if(empty($img_urls)){return;}
         foreach($img_urls as $img_url){
            $ch_data_img = new ChDataImg;
            $ch_data_img->ch_id = $ch_id;
            $ch_data_img->img_url = $img_url;
            
            $ch_data_img->save();
         }

         /** ch_data_size */
                                                
         $crawler->filterXPath('//*[@id="cattid_1"]/a[*]')->each(function ($node) use (&$sizes){
            $sizes[] = $node->text(); 
         }); 
         if(empty($sizes)){return;}
         foreach($sizes as $ch_size){  
         $ch_data_size =  new ChDataSize;
         $ch_data_size->ch_id = $ch_id;
         $ch_data_size->ch_size = $ch_size;
         $ch_data_size->save();
      }}
      $url = null;
      $client = null;
      $crawler = null;
      $textInfo = null;
      unset($match);
      unset($img_urls);
      unset($sizes);
      unset($ch_data);
      unset($ch_data_img);
      unset($ch_data_size);
   } 
   /** read setting*/
      function __construct(){
      $this->second_min = Setting::first()->second_min;
      $this->second_max = Setting::first()->second_max;
      }
      
      /** スクレイピング */
      public function getdata($num){          
      sleep(mt_rand($this->second_min,$this->second_max));
      $this->scrape($num);
      echo "$num"."のデータを取得中\n";
   }
   


}