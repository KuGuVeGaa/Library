<?php

namespace App\Http\Controllers\front\basket;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function add($id){
        $c = Books::where('id','=',$id)->count();
        if ($c !=0 ){
            $basket = [];
            $w = Books::where('id','=',$id)->get();
            $basket[$w[0]['id']]  = ['id'=>$w[0]['id'],'price'=>$w[0]['Price']];
            session(['basket'=>$basket]);
            return redirect()->back()->with('status','Added To Basket');
        }
        else{
            return redirect()->route('index');
        }
    }
}
