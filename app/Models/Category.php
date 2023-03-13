<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    static function getField($id,$field){
        $c = Category::where('id','=',$id)->count();
        if ($c != 0) {
            $cat = Category::where('id','=',$id)->get();
            return $cat[0][$field];
        }
        else{
            return 'Deleted Category';
        }
    }
}
