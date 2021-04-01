<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sauna_ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sauna_reviews')->insert([
            [
                'sauna_id' => 1,
                'user_id' => 1,
                'comment' => '気持ちよかったです！',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'sauna_id' => 1,
                'user_id' => 1,
                'comment' => '最高です！',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'sauna_id' => 1,
                'user_id' => 1,
                'comment' => 'また行きたいです！',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
