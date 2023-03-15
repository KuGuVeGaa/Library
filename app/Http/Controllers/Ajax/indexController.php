<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class indexController extends Controller
{
    public function index(Request $request){
        // Sessionda language Verisini Tutan
//        $request = Request::capture();
//        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
//
//        Session::put('language', $language);
//        $language = Session::get('language');
//        $language =  explode(';',$language);
//        $availableLocales = config('app.available_locales');
//        if ($availableLocales == $language[0]){
//            app()->setLocale($language[0]);
//        }
//        else{
//            app()->setLocale('en');
//        }
        return view('ajax.index');
    }
    public function getData(Request $request){
        $x =  DataTables::of(Category::query())
            ->addColumn('edit',function ($x){
                return '<a href="'.route('admin.category.edit',['id'=>$x->id]).'">Edit</a>';
            })
            ->addColumn('delete',function ($x){
                return '<a href="'.route('admin.category.delete',['id'=>$x->id]).'">Delete</a>';
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
        return $x;
    }
}
