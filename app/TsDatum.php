<?php

namespace App;
use \SplFileObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TsDatum extends Model
{
    protected $table = 'tsdata';
    public $timestamps = false;
    protected $fillable = ['product_id',
                           'ts_id',
                           'stock',
                           'ts_size',
                           'ts_base_price',
                           'ts_normal_price'
                        ];

    protected $casts = [
        'product_id' => 'integer',
        'ts_id' => 'string',
        'show' => 'string',
        'ts_size' => 'string',
        'ts_base_price' => 'integer',
        'ts_normal_price' => 'integer',
    ];
    
    public function GetCsv(Request $request){
        $file_path = $request->file('file')->getPathname();
        $file = new SplFileObject($file_path);
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
        $row_count = 1;
        foreach ($file as $row) {
            if($row_count > 1){
            $data['product_id'] = mb_convert_encoding($row[0], 'UTF-8', 'SJIS');
            $data['ts_id'] = mb_convert_encoding($row[45], 'UTF-8', 'SJIS');
            $data['show'] = mb_convert_encoding($row[46], 'UTF-8', 'SJIS');
            $data['ts_size'] = floatval(mb_substr(mb_convert_encoding($row[5], 'UTF-8', 'SJIS'),0,4));
            $data['ts_base_price'] = mb_convert_encoding($row[49], 'UTF-8', 'SJIS');
            $data['ts_normal_price'] = mb_convert_encoding($row[50], 'UTF-8', 'SJIS');
            $this->insert($data);  
        }
        $row_count++; 
    }
    } 
}
  

