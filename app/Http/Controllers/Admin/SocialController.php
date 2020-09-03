<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $social = Social::orderBy('sort_by')->paginate(5);
        return view('backend.social',compact('social'));
    }
    public function store(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'link'=>$request->link,
            'social'=>$request->social,
            'sort_by'=>$request->sort_by,
        ];
        Social::create($data);
        return redirect()->route('admin.social.index')->with('success','Tạo thành công');
    }
    public function update(Request $request,$id)
    {
        $data= [
            'sort_by'=>$request->sort_by,
            'name'=>$request->name,
            'social'=>$request->social,
            'link'=>$request->link,
        ];
        Social::where('id',$id)->update($data);
        return redirect()->route('admin.social.index')->with('success','Cập nhật thành công');
    }
    public function destroy($id)
    {
        Social::FindOrFail($id)->delete();
        return redirect()->route('admin.social.index')->with('delete','Xóa thành công !');
    }
}
