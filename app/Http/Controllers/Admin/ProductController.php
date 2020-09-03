<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Category;
use App\Color;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Logo;
use App\ParentCategory;
use App\Product;
use App\Size;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $uri = $request->category;
        $categories = Category::all();
        $getCategoryFromUrl = Category::where('slug',$uri)->get();
        $sanpham=[];
        if($request->has('category')){
            $product = Product::all();
            foreach($getCategoryFromUrl as $category)
            {
                foreach($category->product as $item)
                {
                    $sanpham[] = $item;

                }
            }
            return view('backend.product.index',compact('sanpham','categories'));
        }
        else{
            $sanpham = Product::paginate(10);
            return view('backend.product.index',compact('sanpham','categories'));
        }
    }
    public function create()
    {
        $color= Color::all();
        $size = Size::all();
        $gallery = Gallery::all();
        $categories= ParentCategory::all();
        $logo = Logo::all();
        $type = Type::all();
        return view('backend.product.create',compact('categories','gallery','logo','color','size','type'));
    }
    public function store(Request $request)
    {
        if($request->producthot == null)
        {
            $producthot = 0;
        }
        else{
            $producthot =$request->producthot;
        }
        if($request->productnew == null)
        {
            $productnew = 0;
        }
        else{
            $productnew =$request->productnew;
        }


        $data = [
            'name' => $request->name,
            'nametext'=>$request->nametext,
            'nametext2'=>$request->nametext2,
            'slug'=>Str::slug($request->name),
            'producthot'=>$producthot,
            'productnew'=>$productnew,
            'price1' => $request->price1,
            'price2' => $request->price2,
            'avatar'=>$request->avatar,
            'option'=>$request->option,
            'status'=>$request->status,
            'logo'=> $request->logo,
            'type' => $request->type,
            'info1'=> $request->info1,
            'info2'=>$request->info2,
            'info3'=>$request->info3,
            'info4'=>$request->info4
        ];
        $product = Product::create($data);
        $lastId= (int)($product->id);
        $galleryId = $request->gallery;
        $colorId = $request->color;
        $sizeId = $request->size;
        $categoriesId = $request->category;
        $typeId = $request->type;
        Product::FindOrFail($lastId)->gallery()->attach($galleryId);
        Product::FindOrFail($lastId)->Color()->attach($colorId);
        Product::FindOrFail($lastId)->Size()->attach($sizeId);
        Product::findOrFail($lastId)->Category()->attach($categoriesId);
        Product::findOrFail($lastId)->Type()->attach($typeId);
        return redirect()->route('admin.san-pham.index')->with('success','Tạo thành công !');
    }
    public function edit($id)
    {
        $sanphams = Product::FindOrFail($id);
        $colors= Color::all();
        $sizes = Size::all();
        $galleries = Gallery::all();
        $categories= ParentCategory::all();
        $logo = Logo::all();
        $type = Type::all();
        return view('backend.product.edit',compact('categories','galleries','sanphams','logo','colors','sizes','type'));
    }
    public function update(Request $request,$id)
    {
        if($request->producthot == null)
        {
            $producthot = 0;
        }
        else{
            $producthot =$request->producthot;
        }
        if($request->productnew == null)
        {
            $productnew = 0;
        }
        else{
            $productnew =$request->productnew;
        }
        $data = [
            'name' => $request->name,
            'nametext'=>$request->nametext,
            'nametext2'=>$request->nametext2,
            'slug'=>Str::slug($request->name),
            'producthot'=>$producthot,
            'productnew'=>$productnew,
            'price1' => $request->price1,
            'price2' => $request->price2,
            'avatar'=>$request->avatar,
            'option'=>$request->option,
            'status'=>$request->status,
            'logo'=> $request->logo,
            'type' => $request->type,
            'info1'=> $request->info1,
            'info2'=>$request->info2,
            'info3'=>$request->info3,
            'info4'=>$request->info4
        ];
        Product::FindOrFail($id)->update($data);
        $lastId= $id;
        $galleryId = $request->gallery;
        $colorId = $request->color;
        $sizeId = $request->size;
        $categoriesId = $request->category;
        $typeId = $request->type;
        Product::FindOrFail($lastId)->gallery()->sync($galleryId);
        Product::FindOrFail($lastId)->Color()->sync($colorId);
        Product::FindOrFail($lastId)->Size()->sync($sizeId);
        Product::findOrFail($lastId)->Category()->sync($categoriesId);
        Product::findOrFail($lastId)->Type()->sync($typeId);
        return redirect()->route('admin.san-pham.index')->with('update','Cập nhật thành công !');
    }
    public function destroy($id)
    {
        Product::FindOrFail($id)->Category()->detach();
        Product::FindOrFail($id)->Gallery()->detach();
        Product::FindOrFail($id)->Color()->detach();
        Product::FindOrFail($id)->Size()->detach();
        Product::FindOrFail($id)->Type()->detach();
        Product::FindOrFail($id)->delete();
        return redirect()->route('admin.san-pham.index')->with('delete','Xóa sản phẩm thành công !');
    }


    public function show(Request $request, $id)
    {
        $data= $request->all();
        Product::FindOrFail($id)->update($data);
        return redirect()->route('admin.san-pham.index');
    }
}
