<?php

namespace App\Http\Controllers\Admin;

use App\Carts;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $users = User::all();
        $product = Product::all();
        $contact = Contact::paginate(10);
        return view('backend.contact.index',compact('contact','product','users'));
    }
    public function destroy($id){
        Contact::FindOrFail($id)->delete();
        return redirect()->route('admin.lien-he.index');
    }

    public function ordersIndex()
    {
        $orders = Orders::paginate(10);
        $carts = Carts::all();
        $users = User::all();
        $product = Product::all();
        return view('backend.contact.orders',compact('orders','carts','users','product'));
    }
    public function orderDestroy($id){
        Orders::FindOrFail($id)->delete();
        foreach(Carts::where('checkout_id',$id) as $item)
        {
            $item->delete();
        }
        return redirect()->route('admin.lien-he.index');
    }
}
