<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Comment::all();
        return response()->json([
            'message' => 'comment data got successfully',
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
        //画像処理記載
        $filename = $request->img;
        $filename = preg_replace('/^data:image.*base64,/','', $filename);
        $filename = str_replace(' ','+', $filename);
        $image = base64_decode($filename);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mine_type = finfo_buffer($finfo, $image);
        $extenstions = [
            'image/gif' => 'gif',
            'image/jpeg' => 'jpeg',
            'image/png' => 'png'
        ];
        //保存ファイル名はランダム表記
        $random_str = Str::random(10);
        $filename = $random_str . '.' . $extenstions[$mine_type];
        $store_dir = 'comments';
        $storefile = sprintf('%s/%s', $store_dir, $filename);
        Storage::disk('s3')->put($storefile, $image);
        $image_path = Storage::disk('s3')->url($storefile);
        $comment = new Comment;
        $now = Carbon::now();
        $comment->tourist_id = $request->tourist_id;
        $comment->name = $request->name;
        $comment->title = $request->title;
        $comment->review = $request->review;
        $comment->comment = $request->comment;
        $comment->image_path = $image_path;
        $comment->created_at = $now;
        $comment->updated_at = $now;
        $comment->save();
        return response() -> json([
            'message' => 'positing comment successfully',
            'data' => $comment
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
