<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleTabaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'pref_number' => '40',
            'pref_name' => '福岡県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '44',
            'pref_name' => '大分県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '41',
            'pref_name' => '佐賀県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '42',
            'pref_name' => '長崎県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '43',
            'pref_name' => '熊本県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '45',
            'pref_name' => '宮崎県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '46',
            'pref_name' => '鹿児島県',
            'pref_image_path' => 'https://illustimage.com/photo/1643.png',
            'pref_description' => '九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市九州の玄関都市',
        ];
        DB::table('prefectures')->insert($param);
    }
}
