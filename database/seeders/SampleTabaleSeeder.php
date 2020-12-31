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
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/fukuoka.png',
            'pref_description' => '福岡県は九州にある県で、県庁所在地はかつて城下町として栄えた福岡市です。桜の名所として有名な舞鶴公園では、江戸時代の城跡が今もなお見られます。',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '44',
            'pref_name' => '大分県',
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/oita.png',
            'pref_description' => '大分県は九州の沿岸部にある県です。人気の別府温泉をはじめとする温泉街で知られています。',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '41',
            'pref_name' => '佐賀県',
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/saga.png',
            'pref_description' => '佐賀県は九州の北西部にあり、県の北西部にある有田町、伊万里市、唐津市で作られる伝統的な陶磁器で知られています。',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '42',
            'pref_name' => '長崎県',
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/nagasaki.png',
            'pref_description' => '長崎県は九州の西海岸にあり、火山、森林に覆われた沖合の島々、温泉地で知られています。',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '43',
            'pref_name' => '熊本県',
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/kumamoto.png',
            'pref_description' => '熊本県は九州中部にある県で、多くの活火山、急流の川、温泉地、17 世紀に建てられた熊本城があります。',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '45',
            'pref_name' => '宮崎県',
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/miyazaki.png',
            'pref_description' => '宮崎県は九州にあり、ビーチや海辺のドライブで知られています。青島海水浴場は海水浴で人気があります。',
        ];
        DB::table('prefectures')->insert($param);
        $param = [
            'pref_number' => '46',
            'pref_name' => '鹿児島県',
            'pref_image_path' => 'https://japan-map.com/wp-content/uploads/kagoshima.png',
            'pref_description' => '鹿児島県は九州の南端にある県です。鹿児島湾に面し、南西部にはいくつもの小さな島々があります。',
        ];
        DB::table('prefectures')->insert($param);
    }
}
