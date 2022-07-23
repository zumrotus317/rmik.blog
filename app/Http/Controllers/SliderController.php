<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Slider;

class SliderController extends Controller
{
    //
public function create()
    {
    $category = Categories::get();
    return view('admin.slider.create', compact('category'));
    }
public function insert(Request $request)
    {
    $request->validate(Slider::$rules);
    $requests = $request->all();
    $requests['image'] = "";
    if ($request->hasFile('image')) {
        $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
        $request->file('image')->move("file/slider/", $files);
        $requests['image'] = "file/slider/" . $files;
    }

    $cat = Slider::create($requests);
    if($cat){
        return redirect('admin/slider')->with('status', 'Berhasil menambah data !');
    }

    return redirect('admin/slider')->with('status', 'Gagal menambah data !');
    }
public function index()
    {
    $data = Slider::all();
    return view('admin.slider.index',compact('data'));
    }
public function delete($id)
    {
        
        $data = Slider::find($id);
        if ($data == null) {
            return redirect('admin/slider')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/slider')->with('status', 'Berhasil hapus slider !');
        }
        return redirect('admin/slider')->with('status', 'Gagal hapus slider !');
    }

public function edit($id)
{
    $data = Slider::find($id);
    $category = Categories::get();
    return view('admin.slider.edit', compact('data', 'category'));
}

public function update(Request $request, $id)
{
    $d = Slider::find($id);
    if ($d == null) {
        return redirect('admin/slider')->with('status', 'Data tidak ditemukan !');
    }

    $req = $request->all();

    if ($request->hasFile('image')) {
        if ($d->image !== null) {
            File::delete("$d->image");
        }
        $slider = Str::random("20") . "-" . $request->image->getClientOriginalName();
        $request->file('image')->move("file/slider/", $slider);
        $req['image'] = "file/slider/" . $slider;
    }

    $data = Slider::find($id)->update($req);
    if ($data) {
        return redirect('admin/slider')->with('status', 'Slider berhasil diedit !');
    }
    return redirect('admin/slider')->with('status', 'Gagal edit slider !');
}

}
