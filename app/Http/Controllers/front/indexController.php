<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
        return view('front.index');
    }
}
