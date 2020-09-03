<?php

namespace App\Http\Controllers\Themes;

use App\Carts;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Voncher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $value=$request->value;

        $price = \Cart::instance('saveForLater')->total(0,'','');
        $sale = ($price-(($value * $price) / 100));
        $cartRole = $request->cart_role;
        if($cartRole == 0)
        {
            $order = new Orders;
            $order->user_id = $request->user_id;
            $order->name = $request->username;
            $order->email = $request->useremail;
            $order->call = $request->usercall;
            $order->address = $request->address;
            $order->text = $request->text;
            if($request->code){
                $order->total = $sale;
            }else{
                $order->total =\Cart::instance('saveForLater')->total(0,'','');
            }
            $order->save();

            foreach(\Cart::instance('saveForLater')->content() as $item)
            {
                $cart= new Carts;
                $cart->checkout_id = $order->id;
                $cart->product_id = $item->id;
                $cart->product_name = $item->name;
                $cart->quantity = $item->qty;
                $cart->price = $item->price;
                $cart->color = $item->options->color;
                $cart->save();
            }
            \Cart::destroy();
            return redirect()->route('lien-he.index')->with('success','Thanks for puchase !');
        }
        elseif($cartRole == 1)
        {
            return redirect()->route('cart.index')->with('success','Giỏ hàng chưa được cập nhật');
        }
    }
    public function checkVoncher(Request $request)
    {
        if(count(Voncher::all())>0)
        {
            $code =$request->voncher;
            $data = DB::table('vonchers')->get();
            $voncher = $data->pluck('voncher');
            $values = $data->pluck('value');
                foreach($voncher as $item)
            {
                foreach($values as $value)
                {
                    if($item == $code)
                    {
                        return redirect()->route('cart.index')->with('check','<<---[ '.$code.' ]--->> Đúng !')->with('code',$code)->with('value',$value);
                    }
                    else
                    {
                        return redirect()->route('cart.index')->with('error','<<---[ '.$code.' ]--->> Sai !');
                    }
                }

            }
        }else{
            return redirect()->route('cart.index')->with('error','Không có voncher trong data!');
        }

        }
    }
