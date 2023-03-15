<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Writers;

class Books extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function writer(){
        return $this->hasOne(Writers::class,'id','writerId');
    }
    public function publisher(){
        return $this->hasOne(Publisher::class,'id','publisherId');
    }
    public function category(){
        return $this->hasOne(Category::class,'id','categoryId');
    }
}
