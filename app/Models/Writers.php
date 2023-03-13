<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writers extends Model
{
    protected $table = 'writers';
    protected $guarded = [];

    static function getField($id, $field)
    {
        $c = Writers::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Writers::where('id','=',$id)->get();
            return $data[0][$field];
        }
        else{
            return 'Deleted Writers';
        }
    }
}
