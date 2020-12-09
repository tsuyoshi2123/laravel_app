<?php

use Illuminate\Database\Seeder;

class PrefecturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->truncate();
        $kanto = [
            '東京' => '新宿区',
            '神奈川' => '横浜市',
            '埼玉' => 'さいたま市',
            '千葉' => '千葉市',
            '茨城' => '水戸市',
            '群馬' => '前橋市'
        ];

        foreach ($kanto as $pre => $city) {
            DB::table('prefectures')->insert([
                'city' => $city,
                'pref' => $pre
            ]);
        }
    }
}
