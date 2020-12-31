<?php

namespace App\Http\Controllers;

use App\Models\Tourist;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class TouristsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $tourists = DB::table('tourists')
            ->select(DB::raw('pref_id,tourists.id, place_name , description, round(avg(review),1) as review'))
            ->join('comments', 'tourists.id', '=', 'comments.tourist_id')
            ->groupBy('tourist_id')
            ->orderBy('review', 'desc')
            ->limit(3)
            ->get();
        return response()->json([
            'message' => 'tourist_datas got successfully',
            'data' => $tourists,
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
        //まずは、画像処理記載
        $file_name = $request->tourist_img;
        $file_name = preg_replace('/^data:image.*base64,/', '', $file_name);
        $file_name = str_replace(' ', '+', $file_name);
        // $image_info = base64_decode($file_name);
        // $file_info = finfo_open(FILEINFO_MIME_TYPE);
        // $file_mine_type = finfo_buffer($file_info, $image_info);
        // $extenstions = [
        //     'image/gif' => 'gif',
        //     'image/jpeg' => 'jpeg',
        //     'image/png' => 'png'
        // ];
        // //保存ファイル名はランダム表記
        // $random_text = Str::random(10);
        // $img_name = $random_text . '.' . $extenstions[$file_mine_type];
        // $store_fld = 'comments';
        // $store_file = sprintf('%s/%s', $store_fld, $img_name);
        // Storage::disk('s3')->put($store_file, $image_info);
        // $place_image_path = Storage::disk('s3')->url($store_file);



        // //観光地情報
        // $item = new Tourist;
        // $item->place_name = $request->place_name;
        // $item->description = $request->description;
        // $item->place_image_path = $place_image_path;
        // $item->pref_id = $request->pref_id;
        // $item->save();

        // // 一緒にコメントも送る
        // //まずは、画像処理記載
        // $filename = $request->img;
        // $filename = preg_replace('/^data:image.*base64,/', '', $filename);
        // $filename = str_replace(' ', '+', $filename);
        // $image = base64_decode($filename);
        // $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // $mine_type = finfo_buffer($finfo, $image);
        // //保存ファイル名はランダム表記
        // $random_str = Str::random(10);
        // $filename = $random_str . '.' . $extenstions[$mine_type];
        // $store_dir = 'comments';
        // $storefile = sprintf('%s/%s', $store_dir, $filename);
        // Storage::disk('s3')->put($storefile, $image);
        // $image_path = Storage::disk('s3')->url($storefile);

        // //テキスト
        // $comment = new Comment;
        // $now = Carbon::now();
        // $comment->tourist_id = $item->id;
        // $comment->name = $request->name;
        // $comment->title = $request->title;
        // $comment->review = $request->review;
        // $comment->comment = $request->comment;
        // $comment->image_path = $image_path;
        // $comment->created_at = $now;
        // $comment->updated_at = $now;
        // $comment->save();

        return response() -> json([
            'message' => 'tourist_data and comment created successfully',
            'data' => $file_name,
            // 'commentData' => $comment
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
        $items = [
            'item' => $item,
            'comments' => $comments
        ];
        return response()->json([
            'message' => 'tourist_data got successfully',
            'data' => $items
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
