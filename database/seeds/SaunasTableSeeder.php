<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('saunas')->insert([
            
        // [
        //     'name' => '極楽湯 女池店',
        //     'city_id' => 1,
        //     'address' => '中央区女池6丁目1-11',
        //     'holiday_id' => 8,
        //     'start_time' => '10:00',
        //     'end_time' => '24:00',
        //     'price' => '630',
        //     'tag_checks' => '1,2,3,4,5,6',
        //     'pic1' => '',
        //     'user_id' => 1,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ],
        [
            'name' => '秋葉温泉 花水',
            'city_id' => 1,
            'address' => '秋葉区草水町1丁目1-4-5',
            'holiday_id' => 8,
            'start_time' => '10:00',
            'end_time' => '22:00',
            'price' => 950,
            'tag_checks' => '1,2,3,4,5,6',
            'pic1' => 'sauna_img.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ],
        [
            'name' => 'スーパー銭湯越後長岡ゆらいや',
            'city_id' => 2,
            'address' => '川崎町1497-4',
            'holiday_id' => 8,
            'start_time' => '10:00',
            'end_time' => '24:00',
            'price' => 650,
            'tag_checks' => '1,2,3,4,5,6',
            'pic1' => 'sauna_img.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ],
        [
            'name' => '越後長岡ゆらいや華の湯',
            'city_id' => 2,
            'address' => '堺町6-1',
            'holiday_id' => 8,
            'start_time' => '9:00',
            'end_time' => '24:00',
            'price' => 600,
            'tag_checks' =>  '1,2,3,4,5,6',
            'pic1' => 'sauna_img.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ],
        [
            'name' => 'Hostel Perch',
            'city_id' => 6,
            'address' => '河原田諏訪町4',
            'holiday_id' => 1,
            'start_time' => '13:00',
            'end_time' => '20:30',
            'price' => 900,
            'tag_checks' => '1,2,3,5',
            'pic1' => 'sauna_img.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ],

        ]);
    }
}
