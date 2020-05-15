<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\models\Product;
use App\models\Store;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function __construct()

    {
        $this->middleware('auth:store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //現在ログインしているストアのデータを取得する
        $storeData      = Auth::user();
        $id             = $storeData->id;
        //store_idが$idである最新のprooduct５件を取得し、変数へ収納
        $productData    = Store::find($id)->products()->orderBy('id', 'desc')->limit(5)->get();
        Log::info('ログインストアデータ:' . $storeData);
        Log::info('ストアid:' . $id);
        Log::info('取得プロダクトデータ:' . $productData);

        return view('store.home', compact(['storeData', 'productData']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}