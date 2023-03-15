<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\imageUploadHelper;
use App\Helper\xHelper;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Slider;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = [];
        $data['slider'] = Slider::paginate(10);
        return view('admin.slider.index', $data);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $all['image'] = imageUploadHelper::singleUpload(rand(1, 9000), 'slider', $request->file('image'));
        $insert = Slider::create($all);
        if ($all['image'] != '')
            if ($insert) {
                return redirect()->back()->with('status', 'Added Slider') . redirect('/admin/slider');
            } else {
                return redirect()->back()->with('status', 'Didn\'t Add');
            }
        else {
            return redirect()->back()->with('status', 'Slider Empty');
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['slider'] = Slider::where('id', '=', $id)->get();
        return view('admin.slider.edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Slider::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Slider::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['image'] = imageUploadHelper::singleUploadUpdate(rand(1, 90000), 'slider', $request->file('image'), $data, 'image');
            $update = Slider::where('id', '=', $id)->update($all);
            if ($update) {
                return redirect()->back()->with('status', ' Updated Slider');
            } else {
                return redirect()->back()->with('status', 'Slider Didn\'t Update');
            }
        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $data = [];
        $data['slider'] = Slider::where('id', '=', $id)->delete();
        if ($data['slider']) {
            return redirect()->back()->with('status', 'Slider Deleted');
        } else {
            return redirect()->back()->with('status', 'Slider Didn\'t Add');
        }
    }
}
