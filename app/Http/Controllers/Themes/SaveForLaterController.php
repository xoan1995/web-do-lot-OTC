<?php

namespace App\Http\Controllers\Themes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
    public function destroy($id)
    {
        \Cart::instance('saveForLater')->remove($id);
        return back()->with('success','product deleted !');
    }
    public function moveToCart(Request $request,$id)
    {
        $item = \Cart::instance('saveForLater')->get($id);
        \Cart::instance('saveForLater')->remove($id);

        $duplicate =\Cart::instance('default')->search(function($rowId) use ($id){
            return $rowId->id === $id;
        });

        if($duplicate->isNotEmpty())
        {
            return redirect()->route('cart.index')->with('success','This product still in cart !');
        }
        \Cart::instance('default')->add($item->id,$item->name,$item->qty,$item->price)->associate('App\Product');
        return redirect()->route('cart.index')->with('success','Product addded to cart !');
    }
}
