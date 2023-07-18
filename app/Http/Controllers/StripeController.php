<?php

namespace App\Http\Controllers;
use Stripe\Stripe;

use Illuminate\Http\Request;
use App\Models\event;


class StripeController extends Controller
{
    public function show(){
        return view("frontend.checkOut");
    }

    public function displayData($eventId)
    {
    
        $checkOut = event::findOrFail($eventId);
        return view('frontend.checkOut', compact('checkOut'));
    }

    public function session(Request $request){
       Stripe::setApiKey(config('stripe.sk'));
        $eventname=$request->get('eventname');
        $totalprice=$request->get('total');
        $two="00";
        $total="$totalprice$two";

         $session=\Stripe\checkout\session::create([
            'line_items'=>[
                [
                    'price_data'=>[
                        'currency'=>'USD',
                        'product_data'=>[
                            "name"=>$eventname,
                        ],
                        'unit_amount'=>$total,
                    ],
                    'quantity'=>1,
                    ],
                ],
                'mode'=>'payment',
                'success_url'=>route('success'),
                'cancel_url'=>route('checkout'),
        ]);
        return redirect()->away($session->url);
    }

    public function success(){
        return "success";
    }




}
