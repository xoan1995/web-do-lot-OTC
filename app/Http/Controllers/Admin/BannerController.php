<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('sort_by')->paginate(5);
        return view('backend.banner.index',compact('banner'));
    }
    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'text',
            'link',
            'banner',
            'sort_by',
            'type'
        ]);
        Banner::create($data);
        return redirect()->route('admin.banner.index')->with('success','Tạo thành công');
    }
    public function edit($id)
    {
        $banner = Banner::FindOrFail($id);
        return view('backend.banner.edit',compact('banner'));
    }
    public function update(Request $request,$id)
    {
        $data = $request->only([
            'name',
            'text',
            'link',
            'banner',
            'sort_by',
            'type'
        ]);
        Banner::where('id',$id)->update($data);
        return redirect()->route('admin.banner.index')->with('update','Cập nhật thành công');
    }
    public function destroy($id)
    {
        Banner::FindOrFail($id)->delete();
        return redirect()->route('admin.banner.index')->with('error','Xóa thành công !');
    }
}
