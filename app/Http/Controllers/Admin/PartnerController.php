<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::orderBy('sort_by')->paginate(5);
        return view('backend.partner',compact('partner'));
    }
    public function store(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'link'=>$request->link,
            'partner'=>$request->partner,
            'sort_by'=>$request->sort_by,
        ];
        Partner::create($data);
        return redirect()->route('admin.partner.index')->with('success','Tạo thành công');
    }
    public function update(Request $request,$id)
    {
        $data= [
            'sort_by'=>$request->sort_by,
            'name'=>$request->name,
            'link'=>$request->link,
        ];
        Partner::where('id',$id)->update($data);
        return redirect()->route('admin.partner.index')->with('success','Cập nhật thành công');
    }
    public function destroy($id)
    {
        Partner::FindOrFail($id)->delete();
        return redirect()->route('admin.partner.index')->with('delete','Xóa thành công !');
    }
}
