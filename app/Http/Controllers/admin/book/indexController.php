<?php

namespace App\Http\Controllers\admin\book;

use App\Helper\imageUploadHelper;
use App\Helper\xHelper;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Writers;
use Doctrine\Inflector\Rules\NorwegianBokmal\Inflectible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class indexController extends Controller
{
    public function index()
    {
        $data = Books::with('writer')->paginate(10);
        return view('admin.book.index', ['data' => $data]);
    }

    public function create()
    {
        $writer = Writers::all();
        $publisher = Publisher::all();
        $category = Category::all();

        return view('admin.book.create', ['writers' => $writer, 'publishers' => $publisher, 'category' => $category]);
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = xHelper::permalink($all['name']);
        $all['image'] = imageUploadHelper::singleUpload(rand(1, 19000), 'book', $request->file('image'));

        $insert = Books::create($all);

        if ($insert) {
            return redirect()->back()->with('status', $all['name'] . ' Added Book') . redirect('admin/book');
        } else {
            return redirect()->back()->with('status', 'Didn\'t add Book');
        }
    }

    public function edit($id)
    {
        $c = Books::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Books::where('id', '=', $id)->get();
            $writer = Writers::all();
            $publisher = Publisher::all();
            $category = Category::all();
            return view('admin.book.edit', ['data' => $data, 'writer' => $writer, 'publisher' => $publisher, 'category' => $category]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Books::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Books::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = xHelper::permalink($all['name']);
            $all['image'] = imageUploadHelper::singleUploadUpdate(rand(1, 90000), 'book', $request->file('image'), $data, 'image');
            $update = Books::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', $all['name'] . ' Updated Book');
            } else {
                return redirect()->back()->with('status', 'Book Didn\'t Update');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $c = Books::where('id', '=', $id)->count();
        if ($c != 0) {
            $temp = Books::where('id', '=', $id)->get();
            $data = Books::where('id', '=', $id)->get();
            $file = File::delete('public/' . $data[0]['image']);
            $path = explode('/', $data[0]['image']);
            $file = File::exists(public_path($path[0] . '/' . $path[1] . '/' . $path[2]));
            $delete = Books::where('id', '=', $id)->delete();
            if ($delete && $file) {
                return redirect()->back()->with('status', $temp['name'] . ' Deleted') . redirect('/admin/book/') . $temp = null;
            } else {
                return redirect()->back()->with('status', 'Didn\'t Delete');
            }
        } else {
            return redirect('/');
        }
    }
}
