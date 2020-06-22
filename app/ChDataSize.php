<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChDataSize extends Model
{
    protected $fillable =[
        'ch_id',
        'ch_size'
    ];
    protected $table = 'ch_data_size';
    public $timestamps = false;
    public function setChIdAttribute($value){
        $this->attributes['ch_id'] =  "TS".$value;
    }
    public function setChSizeAttribute($value){
        $this->attributes['ch_size'] =  (floatval($value) + 10)/2;
    }
}



