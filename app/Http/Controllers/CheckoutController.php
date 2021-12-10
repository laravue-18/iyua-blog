<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CoreConfig;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function post(Request $request){

            $data = $request->validate([
                'first_name' => 'string|required',
                'last_name' => 'string|required',
                'email' => 'email|required',
                'address1' => 'string|required',
                'country' => 'string|required',
                'state' => 'string|nullable',
                'city' => 'string|required',
                'postcode' => 'required',
                'phone' => 'required',
            ]);
            $core_config = CoreConfig::all()->pluck('value', 'code');
            session()->put('shipping_address', $data);
            return view('home.checkout.paypal')->with(compact('core_config'));
    }

    public function success(){
        foreach(session('cart') as $item){
            $data = array_merge($item, session('shipping_address'));
            $data['status'] = 'ordered';

            Order::create($data);
        }

        session()->put('cart');

        return view('home.checkout.success');
    }

    public function cancel(){
        return view('home.checkout.cancel');
    }
}
