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
}