<?php

namespace App\Http\Controllers\Themes;
use Illuminate\Support\Str;
use App\About;
use App\Banner;
use App\Category;
use App\Color;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Logo;
use App\Partner;
use Illuminate\Http\Request;
use App\Product;
use App\Size;
use App\Type;

class IndexController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('sort_by')->get();
        $categories= Category::where('showindex',1)->get();
        $submenuCategory = Category::all();
        $product = Product::all();
        $logo = Logo::all();
        return view('frontend.index',compact('banner','product','categories','submenuCategory','logo'));
    }

    public function category($category)
    {
        $categorytype2 = Category::where('type',2)->get();
        $banner = Banner::orderBy('sort_by')->get();
        $categories = Category::where('slug',$category)->first();
        if($categories->type == 1)
        {
            $size = Size::all();
            $type = Type::all();
            $color = Color::all();
            $price = Product::select('price2')->get();
            return view('frontend.product.index',compact('categories','banner','size','type','color','price'));
        }
        if($categories->type == 2)
        {
            $about = About::paginate(5);
            return view('frontend.about.index',compact('categories','categorytype2','banner','about'));
        }
    }

    public function show($category,$name){
        if(count(Product::where('slug',$name)->get())>0)
            {
                $categoryFirst = Category::where('type',1)
                                ->where('slug',$category)
                                ->first();
                $categories = Category::where('slug',$category)
                                ->get();
                $product = Product::where('slug',$name)->first();
                $products = Product::all();
                return view('frontend.product.show',compact('product','products','categoryFirst','categories'));
            }
        if(count(About::where('slug',$name)->get())>0){
            $content = About::where('slug',$name)->firstOrFail();
            return view('frontend.about.show',compact('content'));
        }

    }

}
