<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class LogoController extends Controller
{
    public function index()
    {
        $logo = Logo::paginate(5);
        return view('backend.logo',compact('logo'));
    }
    public function store(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'link'=>$request->link,
            'logo'=>$request->logo,
        ];
        Logo::create($data);
        return redirect()->route('admin.logo.index')->with('success','Tạo thành công');
    }
    public function update(Request $request,$id)
    {
        $data = [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'link'=>$request->link,
            'logo'=>$request->logo,
        ];
        Logo::where('id',$id)->update($data);
        return redirect()->route('admin.logo.index')->with('success','Cập nhật thành công');
    }
    public function destroy($id)
    {
        Logo::FindOrFail($id)->delete();
        return redirect()->route('admin.logo.index')->with('delete','Xóa thành công !');
    }
}
