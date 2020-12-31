<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchesController extends Controller
{
    public function index(Request $request)
    {
        // リクエストに応じ都道府県情報を取得
        $item = $request->all();
        $pref= DB::table('prefectures')->where('pref_number', $item['pref'])->first();
        // 都道府県テーブルと観光地テーブルを紐付け、その都道府県に所在する観光地のデータを取得
        if (!empty($item['keyword'])) {
            $pref_data = DB::table('tourists')
                ->where('pref_id', $pref->pref_number)
                ->where('place_name', 'LIKE', "%{$item['keyword']}%")
                ->paginate(5);
        } else {
            $pref_data = DB::table('tourists')
                ->where('pref_id', $pref->pref_number)
                ->paginate(5);
        }
        return response()->json([
            'data' => $pref_data,
            'message' => 'tourist_data got successfully'
        ], 200);
    }
}
