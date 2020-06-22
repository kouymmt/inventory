<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChDataImg extends Model
{
    protected $fillable = [
        'ch_id',
        'img_url'
    ]; 
    protected $table = 'ch_data_img';
    public $timestamps = false;
}
