<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Themes;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function index()
    {
        $themes = Themes::first();
        return view('backend.themes',compact('themes'));
    }
    public function update(Request $request,$id)
    {
        $data= $request->all();
        Themes::FindOrFail($id)->update($data);
        return redirect()->route('admin.giao-dien.index')->with('success','Cập nhật giao diện thành công');
    }
}
