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
    public function show(Prefecture $prefecture)
    {
        // リクエストに応じ都道府県情報を取得
        $pref = Prefecture::where('pref_number', $prefecture->pref_number)->first();
        // // 都道府県テーブルと観光地テーブルを紐付け、その都道府県に所在する観光地のデータを取得
        // $pref_data =DB::table('tourists')->where('pref_id', $pref->pref_number)->get();
        // $items = [
        //     'pref' => $pref,
        //     'pref_data' => $pref_data
        // ];
        return response()->json([
            'data' => $items,
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
