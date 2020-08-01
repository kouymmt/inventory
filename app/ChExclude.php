<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChExclude extends Model
{
    protected $table = 'ch_exclude';
    public $timestamps = false;
    protected $fillable =[
        'ch_id'
    ];
    
}
