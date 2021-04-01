<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaunaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sauna_tag')->insert([
            
            [
                'sauna_id' => 1,
                'tag_id' => 1
            ],
            [
                'sauna_id' => 1,
                'tag_id' => 2
            ],
            [
                'sauna_id' => 1,
                'tag_id' => 3
            ],
            [
                'sauna_id' => 1,
                'tag_id' => 4
            ],
            [
                'sauna_id' => 1,
                'tag_id' => 5
            ],
            [
                'sauna_id' => 1,
                'tag_id' => 6
            ],

            [
                'sauna_id' => 2,
                'tag_id' => 1
            ],
            [
                'sauna_id' => 2,
                'tag_id' => 2
            ],
            [
                'sauna_id' => 2,
                'tag_id' => 3
            ],
            [
                'sauna_id' => 2,
                'tag_id' => 4
            ],
            [
                'sauna_id' => 2,
                'tag_id' => 5
            ],
            [
                'sauna_id' => 2,
                'tag_id' => 6
            ],
            [
                'sauna_id' => 3,
                'tag_id' => 1
            ],
            [
                'sauna_id' => 3,
                'tag_id' => 2
            ],
            [
                'sauna_id' => 3,
                'tag_id' => 3
            ],
            [
                'sauna_id' => 3,
                'tag_id' => 4
            ],
            [
                'sauna_id' => 3,
                'tag_id' => 5
            ],
            [
                'sauna_id' => 3,
                'tag_id' => 6
            ],
        ]);
    }
}
