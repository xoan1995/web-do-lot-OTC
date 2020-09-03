<?php

namespace App\Http\Controllers\Themes;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('frontend.cart.index',compact('product'));
    }
    public function store(Request $request)
    {
        $duplicate =\Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if($duplicate->isNotEmpty())
        {
            return redirect()->back()->with('error','This product stil in wish-list !');
        }
        \Cart::add(['id'=>$request->id,'name'=>$request->name,'qty'=>$request->quantity,'price'=>$request->price2,'weight'=>0,'options'=>['color'=>$request->color]])->associate('App\Product');
        return redirect('/cart#pills-home')->with('success','Product added in wish-list !');
    }
    public function update(Request $request,$id)
    {
        $item = \Cart::get($id);
        $option = $item->options->merge(['color'=>$request->color]);
        \Cart::update($id,['qty'=>$request->qty,'options' =>$option]);
        return back()->with('success','Product quatity updated !');
    }
    public function destroy($id)
    {
        \Cart::remove($id);
        return back()->with('success','Product deleted !');
    }
    public function saveForLater($id)
    {
        $item = \Cart::get($id);
        \Cart::destroy($id);
        \Cart::instance('saveForLater')->add(['id'=>$item->id,'name'=>$item->name,'qty'=>$item->qty,'price'=>$item->price,'weight'=>0,'options'=>['color'=>$item->options->color]])->associate('App\Product');

        return redirect('/cart#pills-profile')->with('success','Product cart updated !');
    }
    public function addToCart(Request $request)
    {
        $duplicate =\Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->productId;
        });
        if($duplicate->isNotEmpty())
        {
            return redirect()->back()->with('error','This product stil in wish-list !');
        }
        \Cart::instance('saveForLater')->add(['id'=>$request->productId,'name'=>$request->name,'qty'=>$request->soluong,'price'=>$request->price2,'weight'=>0,'options'=>['color'=>$request->color]])->associate('App\Product');
        return redirect('/cart#pills-home')->with('success','Product added in wish-list !');
    }
}
