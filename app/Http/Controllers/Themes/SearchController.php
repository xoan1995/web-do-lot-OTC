<?php

namespace App\Http\Controllers\Themes;
use Illuminate\Support\Str;
use App\Banner;
use App\Category;
use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use App\Size;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Str::slug($request->search);
        $categories = null;
        $products = Product::where('slug','like','%'.$query.'%')
                    ->get();
        $banner = Banner::orderBy('sort_by')->get();
        $size = Size::all();
        $type = Type::all();
        $color = Color::all();
        $price = Product::pluck('price2');
        return view('frontend.product.search',compact('products','categories','banner','size','type','color','price'));
    }
    public function searchCategry(Request $request,$category)
    {
        $query = Str::slug($request->search);
        $categories = Category::where('slug',$category)->firstOrFail();
        $products = Product::where('slug','like','%'.$query.'%')
                    ->get();
        $banner = Banner::orderBy('sort_by')->get();
        $size = Size::all();
        $type = Type::all();
        $color = Color::all();
        $price = Product::pluck('price2');
        return view('frontend.product.search',compact('products','categories','banner','size','type','color','price'));
    }
    public function searchType(Request $request,$category)
    {
        $query = $request->type;
        $categories = Category::where('slug',$category)->firstOrFail();
        $products = Type::where('slug','like','%'.$query.'%')->first()->product;
        $banner = Banner::orderBy('sort_by')->get();
        $size = Size::all();
        $type = Type::all();
        $color = Color::all();
        $price = Product::pluck('price2');
        return view('frontend.product.search',compact('products','categories','banner','size','type','color','price'));
    }
    public function searchSize(Request $request,$category){
        $sizes = $request->size;
        $products=[];
        foreach($sizes as $size)
        {
            $products = Size::where('size',$size)->first()->product;
        }
        $categories = Category::where('slug',$category)->firstOrFail();
        $banner = Banner::orderBy('sort_by')->get();
        $size = Size::all();
        $type = Type::all();
        $color = Color::all();
        $price = Product::select('price2')->get();
        return view('frontend.product.search',compact('products','categories','banner','size','type','color','price'));
    }
    public function searchColor(Request $request,$category)
    {
        $colors = $request->color;
        $categories = Category::where('slug',$category)->firstOrFail();
        $products=[];
        foreach($colors as $color)
        {
            $products = Color::where('color',$color)->first()->product;
        }
        $banner = Banner::orderBy('sort_by')->get();
        $size = Size::all();
        $type = Type::all();
        $color = Color::all();
        $price = Product::select('price2')->get();
        return view('frontend.product.search',compact('products','categories','banner','size','type','color','price'));
    }
    public function searchRange (Request $request,$category)
    {
        $priceRange = explode(';',$request->range);
        $categories = Category::where('slug',$category)->firstOrFail();
        $products = Product::where('price2','>',$priceRange[0]-1)
                        ->where('price2','<',$priceRange[1]+1)
                        ->get();
        $banner = Banner::orderBy('sort_by')->get();
        $size = Size::all();
        $type = Type::all();
        $color = Color::all();
        $price = Product::select('price2')->get();
        return view('frontend.product.search',compact('products','categories','banner','size','type','color','price'));
    }
}
