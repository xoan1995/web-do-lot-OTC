<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $type = Type::all();
        return view('backend.product.style.type',compact('type'));
    }
    public function store(Request $request)
    {
        $data = [
            'img' => $request->img,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];
        Type::create($data);
        return redirect()->route('kieu-dang.index')->with('success','Tạo mục thành công !');
    }
    public function destroy($id)
    {
        Type::FindOrFail($id)->delete();
        return redirect()->route('admin.kieu-dang.index')->with('error','Xóa thành công !');
    }
}
