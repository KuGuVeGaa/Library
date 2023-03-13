<?php

namespace App\Http\Controllers\front\book;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink)
    {
        $c = Books::where('selflink', '=', $selflink)->count();
        if ($c != 0) {
            $data = Books::with('publisher','category')->where('selflink', '=', $selflink)->get();
            return view('front.book.index',['data'=>$data]);
        } else {
            return redirect('/');
        }
    }
}
