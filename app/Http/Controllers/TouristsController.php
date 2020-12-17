<?php

namespace App\Http\Controllers;

use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TouristsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tourist::all();
        return response()->json([
            'message' => 'tourist_datas got successfully',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //観光地データをインサートする
        $item = new Tourist;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->image_path = $request->image_path;
        $item->pref_id = $request->pref_id;
        $item->save();
        return response() -> json([
            'message' => 'tourist_data created successfully',
            'data' => $item
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourist  $tourist
     * @return \Illuminate\Http\Response
     */
    public function show($tourist)
    {
        //観光地詳細情報を取得
        $item = Tourist::where('id', $tourist)->first();
        //それに付随するコメント情報を取得
        $comments = DB::table('comments')->where('tourist_id', $item->id)->get();
        return response()->json([
            'message' => 'tourist_data got successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourist  $tourist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tourist $tourist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourist  $tourist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourist $tourist)
    {
        //
    }
}
