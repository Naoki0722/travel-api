<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrefecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Prefecture::all();
        return response()->json([
            'message' => 'OK',
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prefecture  $prefecture
     * @return \Illuminate\Http\Response
     */
    public function show($prefecture)
    {
        // リクエストに応じ都道府県情報を取得
        $item = Prefecture::where('pref_number', $prefecture)->first();
        // 都道府県テーブルと観光地テーブルを紐付け、その都道府県に所在する観光地のデータを取得
        $items =DB::table('tourists')->where('pref_id', $item->pref_number)->get();
        return response()->json([
            'tourist_data' => $items,
            'pref_data' => $item,
            'message' => 'tourist_data got successfully'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prefecture  $prefecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prefecture $prefecture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prefecture  $prefecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prefecture $prefecture)
    {
        //
    }
}
