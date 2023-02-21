<?php

namespace App\Http\Controllers\admin\writer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Writers;
use App\Helper\imageUploadHelper;
use App\Helper\xHelper;
use NunoMaduro\Collision\Writer;

;

class indexController extends Controller
{
    public function index()
    {
        $data = Writers::paginate(10);
        return view('admin.writer.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.writer.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');
        $all['selflink'] = xHelper::permalink($all['name']);
        $all['image'] = imageUploadHelper::singleUpload(rand(1, 9000), 'writer', $request->file('image'));

        $insert = Writers::create($all);
        if ($insert) {
            return redirect()->back()->with('status', $all['name'] . ' Added') . redirect('admin/writer');
        } else {
            return redirect()->back()->with('status', 'Writer Didn\'t Added');
        }
    }

    public function edit($id)
    {
        $c = Writers::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Writers::where('id', '=', $id)->get();
            return view('admin.writer.edit', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $c = Writers::where('id', '=', $id)->count();
        if ($c != 0) {
            $data = Writers::where('id', '=', $id)->get();
            $all = $request->except('_token');
            $all['selflink'] = xHelper::permalink($all['name']);
            $all['image'] = imageUploadHelper::singleUploadUpdate(rand(1, 900), 'writer', $request->file('image'), $data, 'image');
            $update = Writers::where('id', '=', $id)->update($all);

            if ($update) {
                return redirect()->back()->with('status', $all['name'] . ' Editted') . redirect('admin/writer');
            } else {
                return redirect()->back()->with('status', 'Writer Didn\'t add');
            }

        } else {
            return redirect('/');
        }
    }

    public function delete($id)
    {
        $c = Writers::where('id', '=', $id)->count();
        if ($c != 0) {
            $temp = Writers::where('id', '=', $id)->get();
            $data = Writers::where('id', '=', $id)->delete();
            File::delete('public/'.$temp[0]['image']);
            if ($data) {
                return redirect()->back()->with('status', $temp[0]['name'] . ' Deleted');
            }
        }
    }

}
