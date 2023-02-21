<?php

namespace App\Http\Controllers\admin\book;

use App\Helper\imageUploadHelper;
use App\Helper\xHelper;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Publisher;
use App\Models\Writers;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = Books::paginate(10);
        return view('admin.book.index', ['data' => $data]);
    }

    public function create()
    {
        $writer = Writers::all();
        $publisher = Publisher::all();

        return view('admin.book.create', ['writers' => $writer, 'publishers' => $publisher]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = xHelper::permalink($all['name']);
        $all['image'] = imageUploadHelper::singleUpload(rand(1, 19000), 'book', $request->file('image'));

        $insert = Books::create($all);

        if ($insert) {
            return redirect()->back()->with('status', 'Added Book');
        } else {
            return redirect()->back()->with('status', 'Didn\'t add Book');
        }
    }

    public function edit($id)
    {
        $c = Books::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Books::where('id','=',$id)->get();
            $writer = Writers::all();
            $publisher = Publisher::all();
            return view('admin.book.edit',['data'=>$data,'writer'=>$writer,'publisher'=>$publisher]);
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {

    }
}
