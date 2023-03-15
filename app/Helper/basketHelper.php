<?php
namespace App\Helper;

use Illuminate\Support\Facades\Session;

class basketHelper{
    public function random(){
        $rand = rand(1,500);
        return $rand;
    }
    static function add($id,$price,$image,$name){
        $basket = Session::get('basket');
        $array = [
            'id'=>$id,
            'name'=>$name,
            'image'=>$image,
            'price'=>$price
        ];
        Session::put('basket'.self::random(),$array);
    }
    static function allList(){
        $x = Session::get('basket'.self::random());
        return $x;
    }
    static function totalPrice(){
        $data = self::allList();
        return collect($data)->sum('price');
    }
}
