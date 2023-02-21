<?php

namespace App\Http\Controllers\admin\publisher;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Helper\xHelper;

class indexController extends Controller
{
    public function index()
    {
        $data = Publisher::paginate(10);
        return view('admin.publisher.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = xHelper::permalink($all['name']);

        $insert = Publisher::create($all);

        if ($insert) {
            return redirect()->back()->with('status', $all['name'] . " Added Success") . redirect('/admin/publisher');
        } else {
            return redirect()->back()->with('status', 'Publisher House didn\'t add');
        }
    }

    public function edit($id)
    {
        $c = Publisher::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Publisher::where('id', '=', $id)->get();
            return view('admin.publisher.edit', ['data' => $data]);
        } else {
            return redirect('/');
        }

    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Publisher::where('id', '=', $id)->count();
        if ($c != 0) {
            $all = $request->except('_token');
            $all['selflink'] = xHelper::permalink($all['name']);
            $update = Publisher::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', $all['name'] . ' Editted') . redirect('/admin/publisher');
            } else {
                return redirect()->back()->with('status', 'Publisher\'s House Didn\'t Edit');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $c = Publisher::where('id', '=', $id)->count();
        if ($c != 0) {
            $temp['name'] = Publisher::where('id', '=', $id)->get();
            $delete = Publisher::where('id', '=', $id)->delete();
            //dd($temp);
            if ($delete) {
                return redirect()->back()->with('status', $temp['name'][0]['name'] . '     Deleted') . redirect('/admin/publisher') . $temp = null;;
            } else {
                return redirect()->back()->with('status', 'Publisher\'s House Didn\'t Delete');
            }
        } else {
            return redirect('/');
        }
    }
}
