<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Category;
use App\Http\Controllers\Controller;
use App\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
class AboutController extends Controller
{
    public function index(Request $request)
    {
        $uri = $request->category;

        if($request->has('category')){
            $gioithieu = About::where('category',$uri)->paginate(10);
        }
        else{
            $gioithieu = About::paginate(10);
        }
        $categories = Category::all();
        return view('backend.about.index',compact('categories','gioithieu'));
    }
    public function create()
    {
        $categories= ParentCategory::all();
        return view('backend.about.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $data = [
            'showindex' => $request->showindex,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'-'),
            'text'=>$request->text,
            'image'=>$request->image,
            'editor'=>$request->editor,
            'role'=>$request->role
        ];
        $about = About::create($data);
        $lastId = $about->id;
        $categoryId = $request->category;
        About::FindOrFail($lastId)->Category()->attach($categoryId);
        return redirect()->route('admin.bai-viet.index')->with('success','Thêm bài viết thành công');
    }

    public function edit($id)
    {
        $categories= ParentCategory::all();

        $gioithieu = About::FindOrFail($id);
        return view('backend.about.edit',compact('gioithieu','categories'));
    }
    public function update(Request $request, $id)
    {
        $data = [
            'showindex' => $request->showindex,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name,'-'),
            'text'=>$request->text,
            'image'=>$request->image,
            'editor'=>$request->editor,
            'role'=>$request->role
        ];
        About::FindOrFail($id)->update($data);
        $lastId = $id;
        $categoryId = $request->category;
        About::FindOrFail($lastId)->Category()->sync($categoryId);
        return redirect()->route('admin.bai-viet.index')->with('update','Cập nhật thành công');
    }
    public function destroy($id)
    {
        About::FindOrFail($id)->Category()->detach();
        About::findOrFail($id)->delete();
        return redirect()->route('admin.bai-viet.index')->with('delete','Xóa thành công');
    }
}
