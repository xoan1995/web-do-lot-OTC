<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pricesale;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\User;
use Illuminate\Support\Facades\Gate;

class SellerController extends Controller
{
    public function index()
    {
        $userauth = Auth()->user();
        $users = User::all();
        $product = Product::all();
        return view('backend.seller.index',compact('userauth','users','product'));
    }

    public function create()
    {
        $userauth = Auth::user();
        $product = Product::all();
        $users = User::all();
        return view('backend.seller.create',compact('product','users','userauth'));
    }

    public function store(Request $request)
    {
        if($request->type == 0)
        {
            $pricesale = Pricesale::create(['pricesale'=>$request->saletype1]);
            $lastId = $pricesale->id;
            $userList= $request->user;
            $productList = Product::select('id')->get();
            Pricesale::FindOrFail($lastId)->user()->attach($userList);
            Pricesale::FindOrFail($lastId)->product()->attach($productList);
            return redirect()->route('admin.seller.index')->with('success','Cập nhật giảm giá toàn bộ sản phẩm cho đại lý thành công !');
        }
        if($request->type == 1)
        {
            $pricesale = Pricesale::create(['pricesale'=>$request->saletype2]);
            $lastId = $pricesale->id;
            $userList= $request->user;
            $productList = $request->product;
            Pricesale::FindOrFail($lastId)->user()->attach($userList);
            Pricesale::FindOrFail($lastId)->product()->attach($productList);
            return redirect()->route('admin.seller.index')->with('success','Cập nhật giảm giá nhóm sản phẩm được chọn cho đại lý thành công !');
        }
    }
    public function productSaleDestroy($id)
    {
        Pricesale::FindOrFail($id)->user()->detach();
        Pricesale::FindOrFail($id)->product()->detach();
        Pricesale::FindOrFail($id)->delete();
        return redirect()->route('admin.seller.index')->with('error','Sản phẩm áp dụng giảm giá được hủy !');
    }
    public function updateSalePrice(Request $request,$id)
    {
        $data = [
            'pricesale' => $request->pricesale,
        ];
        $productList = $request->product;
        Pricesale::FindOrFail($id)->product()->sync($productList);
        Pricesale::FindOrFail($id)->update($data);
        return redirect()->route('admin.seller.index')->with('success','Cập nhật giảm giá nhóm sản phẩm được chọn cho đại lý thành công !');
    }
}
