<?php

namespace App\Http\Controllers\Themes;

use App\Banner;
use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Logo;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('sort_by')->get();
        $submenuCategory = Category::all();
        $logo = Logo::all();

        return view('frontend.contact',compact('banner'));
    }
    public function store(Request $request)
    {
        $data= [
            'user_id'=>$request->userid,
            'username'=>$request->username,
            'useremail'=>$request->useremail,
            'usercall'=>$request->usercall,
            'address'=>$request->address,
            'text'=>$request->text,
            'product_id'=>$request->id,
            'color'=>$request->color,
            'price'=>$request->price2,
            'quantity'=>$request->soluong
        ];
        Contact::create($data);
        return redirect()->route('lien-he.index')->with('success','Your order sended !');

    }
}
