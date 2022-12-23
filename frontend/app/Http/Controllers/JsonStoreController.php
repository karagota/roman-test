<?php

namespace App\Http\Controllers;

use App\Models\JsData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class JsonStoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('store');
    }


    public function storeJson(Request $request) {
        $jsData = JsData::create(['data' => json_decode($request->data)]);
        return json_encode(['id'=>$jsData->id,'memory'=>round(memory_get_peak_usage() / 1024)." KB",'time'=>round(microtime(true) - LARAVEL_START).' sec']);
    }
}
