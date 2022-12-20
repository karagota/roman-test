<?php

namespace App\Http\Controllers;

use App\Models\JsData;
use Illuminate\Http\Request;

class AdminController extends Controller
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
    public function index()
    {
        $context = ['jsData' => JsData::latest()->get()];
        return view('admin', $context);
    }

    public function delete(JsData $jsData)
    {
        $jsData->delete();
        return redirect()->route('admin');
    }

    public function edit(JsData $jsData)
    {
        $context = ['id'=> $jsData->id, 'jsData' => json_encode($jsData->data)];
        return view('admin-edit', $context);
    }

    public function save(JsData $jsData, Request $request)
    {
        $jsData->data = json_decode($request->data);
        $jsData->save();
        return redirect()->route('admin');
    }
}
