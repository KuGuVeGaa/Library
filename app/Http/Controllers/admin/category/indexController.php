<?php

namespace App\Http\Controllers\admin\category;

use App\Helper\xHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = Category::paginate(10);
        return view('admin.catagori.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.catagori.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = xHelper::permalink($all['name']);

        $insert = Category::create($all);

        if ($insert) {
            return redirect()->back()->with('status', $all['name'] . " Added Success") . redirect('/admin/category');
        } else {
            return redirect()->back()->with('status', 'Category didn\'t add');
        }
    }

    public function edit($id)
    {
        $c = Category::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Category::where('id', '=', $id)->get();
            return view('admin.catagori.edit', ['data' => $data]);
        } else {
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Category::where('id', '=', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $all['selflink'] = xHelper::permalink($all['name']);
            $update = Category::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', $all['name'] . ' Editted') . redirect('/admin/category');
            } else {
                return redirect()->back()->with('status', 'Category Didn\'t Edit');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $c = Category::where('id', '=', $id)->count();
        if ($c != 0) {
            $temp['name'] = Category::where('id', '=', $id)->get();
            $delete = Category::where('id', '=', $id)->delete();
            //dd($temp);
            if ($delete) {
                return redirect()->back()->with('status', $temp['name'][0]['name'] . '     Deleted') . redirect('/admin/category') . $temp = null;;
            } else {
                return redirect()->back()->with('status', 'Category Didn\'t Delete');
            }
        } else {
            return redirect('/');
        }
    }
}
