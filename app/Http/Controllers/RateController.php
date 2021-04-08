<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\RateRequest;
use Illuminate\Support\Facades\Http;
use App\Models\Rate;

class RateController extends Controller
{
    public function getRateById($id)
    {
        $rates = Rate::find($id);
        $rateInfo = $rates->toArray();
        $deliveryTime = trim(date('Y-m-d', strtotime("+". $rateInfo['delivery_time'] ." day")));
        return response()->json($deliveryTime);
    }
}
