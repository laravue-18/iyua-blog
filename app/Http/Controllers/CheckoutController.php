<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function post(Request $request){
        if($request['product_id']){
            session()->put('cart', $request->all());
            return view('home.checkout.address');
        }else if($request['shipping_address']){
            session()->put('shipping_address', $request->all());
            return view('home.checkout.paypal');
        }
    }

    public function success(){
        return view('home.checkout.success');
    }

    public function cancel(){
        return view('home.checkout.cancel');
    }
}
