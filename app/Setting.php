<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $fillable = ['start_page', 
                           'end_page',
                            'second_min',
                            'second_max',
                            'start_delay',
                            'truncate_flg',
                            ];
                        
}
