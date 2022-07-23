<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    //
    public function index(){
        $data = Categories::all();
        return view('admin.categories.index',compact('data'));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function insert(Request $request)
    {
        
        $request->validate(Categories::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $files);
            $requests['image'] = "file/category/" . $files;
        }
 
        $cat = Categories::create($requests);
        if($cat){
            return redirect('admin/category')->with('status', 'Berhasil menambah data !');
        }
 
        return redirect('admin/category')->with('status', 'Gagal menambah data !');
    }
    public function delete($id)
    {
        
        $data = Categories::find($id);
        if ($data == null) {
            return redirect('admin/category')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") {
            File::delete("$data->image");
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/category')->with('status', 'Berhasil hapus category !');
        }
        return redirect('admin/category')->with('status', 'Gagal hapus category !');
    }
    public function update(Request $request, $id)
{
    $d = Categories::find($id);
    if ($d == null) {
        return redirect('admin/category')->with('status', 'Data tidak ditemukan !');
    }

    $req = $request->all();

    if ($request->hasFile('image')) {
        if ($d->image !== null) {
            File::delete("$d->image");
        }
        $category = Str::random("20") . "-" . $request->image->getClientOriginalName();
        $request->file('image')->move("file/category/", $category);
        $req['image'] = "file/category/" . $category;
    }

    $data = Categories::find($id)->update($req);
    if ($data) {
        return redirect('admin/category')->with('status', 'Category berhasil diedit !');
    }
    return redirect('admin/category')->with('status', 'Gagal edit category !');
}
public function edit($id)
{
    $data = Categories::find($id);
    return view('admin.categories.edit', compact('data'));
}
}
