<?php

namespace App\Http\Controllers\front\basket;

use App\Helper\basketHelper;
use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(){

        return view('front.basket.index');
    }
    public function add($id){
        $c = Books::where('id','=',$id)->count();
        if ($c !=0 ){
            $w = Books::where('id','=',$id)->get();
            basketHelper::add($id,$w[0]['Price'],asset($w[0]['image']),$w[0]['name']);
            return redirect()->back()->with('status','Added To Basket');
        }
        else{
            return redirect()->route('index');
        }
    }

}
