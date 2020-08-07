<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChData extends Model
{
    protected $fillable = [
        'ch_id',
        'ch_base_price',
        'ch_price',
        'ch_url',
        'num',
        'error_flg'
    ];
    public $timestamps = false;
    public function setChIdAttribute($value){
        $this->attributes['ch_id'] =  "TS".$value;
    }
    public function setChPriceAttribute($value){
        $this->attributes['ch_price'] =  floatval($value) * config('const.fx_rate') + config('const.mark_up');  
       }
    public function setChBasePriceAttribute($value){
        $this->attributes['ch_base_price'] =  floatval($value) * config('const.fx_rate') + config('const.mark_up');  
       }
    public function getChPriceAttribute($value){
        if($value > config('const.price_range_1') && $value < config('const.price_range_2')){
            return floatval($value) + config('const.premium_1');
        }elseif($value >200000){
            return floatval($value) + 100000;
        }else{
            return "$value";
        }  //  return "";
        }
        public function getChBasePriceAttribute($value){
            if($value > config('const.price_range_1') && $value < config('const.price_range_2')){
                return floatval($value) + config('const.premium_1');
            }elseif($value > config('const.price_range_2')){
                return floatval($value) + config('const.premium_2');
            }else{
                return "$value";
            }  //  return "";
            }
}