<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = [];
    protected $table = 'publishers';
    static function getField($id,$field){
        $c = Publisher::where('id','=',$id)->count();
        if ($c != 0) {
            $cat = Publisher::where('id','=',$id)->get();
            return $cat[0][$field];
        }
        else{
            return 'Deleted Publisher House';
        }
    }
}
