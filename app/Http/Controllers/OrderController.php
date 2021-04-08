<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Rate;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function create()
    {
        $rates = json_decode(Rate::all());
        return view('order.create',['rates' => $rates]);
    }

    public function save(Request $request)
    {
        $client = Client::where('phone', $request->phone)->get()->first();
        if (!$client) {
            $client = new Client();
            $client->phone = $request->phone;
            $client->name = $request->name;
            $client->save();
            $clientId = $client->id;
        } else {
            $client->toArray();
            $clientId = $client['id'];
        }

        $order = new Order();
        $order->client_id = $clientId;
        $order->rate_id = $request->rate;
        $order->address = $request->address;
        $order->delivery_day = $request->delivery_day;
        $order->save();

        return back()->with('status', 'Success');
    }

}
