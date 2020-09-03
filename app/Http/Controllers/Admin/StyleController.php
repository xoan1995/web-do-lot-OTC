<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use App\Http\Controllers\Controller;
use App\Size;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    public function index()
    {
        $size = Size::all();
        $color = Color::all();
        return view('backend.product.style.index',compact('color','size'));
    }
    public function colorStore(Request $request)
    {
        $data = $request->only(['color']);
        Color::create($data);
        return redirect()->route('admin.tuy-chinh.index')->with('success','Thêm màu thành công !');
    }
    public function colorDestroy($id)
    {
        Color::FindOrFail($id)->delete();
        return redirect()->route('admin.tuy-chinh.index')->with('error','Xóa màu thành công !');
    }
    public function sizeStore(Request $request)
    {
        $data = $request->only(['size','size2','sizefix']);
        Size::create($data);
        return redirect()->route('admin.tuy-chinh.index')->with('success','Thêm kích thước thành công !');
    }
    public function sizeDestroy($id)
    {
        Size::FindOrFail($id)->delete();
        return redirect()->route('admin.tuy-chinh.index')->with('error','Xóa kích thước thành công !');
    }
}
