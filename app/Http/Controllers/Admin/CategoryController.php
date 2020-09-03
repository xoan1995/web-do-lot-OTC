<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\ParentCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    public function index()
    {
        $parentCategory = ParentCategory::all();
        $category = Category::all();
        return view('backend.category.create',compact('parentCategory','category'));
    }
    public function store(Request $request)
    {
        if($request->checkindex)
        {
            $showindex = 1;
        }
        else{
            $showindex = 0;
        }
        if($request->checkmenutop)
        {
            $checkmenutop = 1;
        }
        else{
            $checkmenutop = 0;
        }
        if($request->submenu)
        {
            $submenu = 1;
        }
        else{
            $submenu = 0;
        }
        if($request->submenu2)
        {
            $submenu2 = 1;
        }
        else{
            $submenu2 = 0;
        }
        $data = [
            'type' =>$request->type,
            'category_id'=>$request->category_id,
            'text' => $request->text,
            'category' => $request->category,
            'slug' => Str::slug($request->category),
            'image'=>$request->image,
            'showmenu'=>$request->showmenu,
            'showindex'=> $showindex,
            'checkmenutop'=>$checkmenutop,
            'submenu'=> $submenu,
            'submenu2'=>$submenu2
        ];
        $category =Category::create($data);
        $lastId = $category->id;
        $parrent = $request->parentId;
        Category::FindOrFail($lastId)->parentCategory()->attach($parrent);
        return redirect()->route('admin.danh-muc-cha.index')->with('success','Tạo thành công');
    }
    public function edit($id)
    {
        $parentCategory = ParentCategory::all();
        $data = Category::FindOrFail($id);
        $category = Category::all();
        return view('backend.category.edit',compact('data','category','parentCategory'));
    }
    public function update(Request $request,$id)
    {
        if($request->checkindex)
        {
            $showindex = 1;
        }
        else{
            $showindex = 0;
        }
        if($request->checkmenutop)
        {
            $checkmenutop = 1;
        }
        else{
            $checkmenutop = 0;
        }
        if($request->submenu)
        {
            $submenu = 1;
        }
        else{
            $submenu = 0;
        }
        if($request->submenu2)
        {
            $submenu2 = 1;
        }
        else{
            $submenu2 = 0;
        }
        $data = [
            'type' =>$request->type,
            'category_id'=>$request->category_id,
            'text' => $request->text,
            'category' => $request->category,
            'slug' => Str::slug($request->category),
            'image'=>$request->image,
            'showmenu'=>$request->showmenu,
            'showindex'=> $showindex,
            'checkmenutop'=>$checkmenutop,
            'submenu'=> $submenu,
            'submenu2'=>$submenu2
        ];
            Category::FindOrFail($id)->update($data);
            $parrent = $request->parentId;
            Category::FindOrFail($id)->parentCategory()->sync($parrent);
            return redirect()->route('admin.danh-muc-cha.index')->with('success','Cập nhật thành công');

    }
    public function destroy($id)
    {
        Category::FindOrFail($id)->parentCategory()->detach();
        Category::FindOrFail($id)->delete();
        return redirect()->route('admin.danh-muc-cha.index')->with('delete','Xóa thành công');
    }

    public function show(Request $request,$id)
    {
        $data= $request->all();
        Category::FindOrFail($id)->update($data);
        return redirect()->route('admin.danh-muc-cha.index');
    }

    public function parent()
    {
        $parentCategory = ParentCategory::orderBy('sort_id','ASC')->get();
        $category=Category::whereNull('category_id')->with('childCategories')->get();
        return view('backend.category.index',compact('parentCategory','category'));
    }
    public function parentCreate(Request $request)
    {
        $data = [
            'label' =>$request->label,
            'link' => Str::slug($request->label),
            'text' => $request->text,
        ];
        ParentCategory::create($data);
        return redirect()->route('admin.danh-muc-cha.index');
    }
    public function parentUpdate(Request $request)
    {
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id)
            {
                $menu = ParentCategory::find($id);
                $menu->sort_id = $sortOrder;
                $menu->save();
            }
            return ['success' => true,'message' =>'Updated'];
        }
    }
    public function parentDelete($id)
    {
        if(count(ParentCategory::FindOrFail($id)->Category) > 0)
        {
            return redirect()->route('admin.danh-muc-cha.index')->with('error','Danh mục cha đanh chứa các danh mục con !');
        }
        else
        {
            ParentCategory::FindOrFail($id)->delete();
            return redirect()->route('admin.danh-muc-cha.index')->with('delete','Xóa thành công !');
        }
        
    }
    public function parentEdit(Request $request,$id)
    {
        $data = ['label' =>$request->label,'text'=>$request->text];
        ParentCategory::FindOrFail($id)->update($data);
        return redirect()->route('admin.danh-muc-cha.index');
    }
    public function parentShow(Request $request,$id)
    {
        $data = $request->all();
        ParentCategory::FindOrFail($id)->update($data);
        return redirect()->route('admin.danh-muc-cha.index');
    }
}
