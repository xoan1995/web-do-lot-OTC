<?php

namespace App\Http\Controllers\Admin;

use App\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){
        $footer = Footer::paginate(8);
        return view('backend.footer.index',compact('footer'));
    }
    public function create(){
        return view('backend.footer.create');
    }
    public function store(Request $request)
    {
        $data = $request->only(['header','content']);
        Footer::create($data);
        return redirect()->route('admin.footer.index')->with('success','Tạo footer thành công');
    }
    public function edit($id)
    {
        $footer = Footer::findOrFail($id);
        return view('backend.footer.edit',compact('footer'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->only(['header','content']);
        Footer::FindOrFail($id)->update($data);
        return redirect()->route('admin.footer.index')->with('update','Cập nhật footer thành công !');
    }
    public function destroy($id)
    {
        Footer::FindOrFail($id)->delete();
        return redirect()->route('admin.footer.index')->with('error','Xóa footer thành công !');
    }
}
