<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name' => 'test2',
            'email' => 'test2@com',
            'password' => bcrypt('password'),  //パスワードをハッシュ化
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
    
        [
        'name' => 'test3',
        'email' => 'test3@com',
        'password' => bcrypt('password'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ],
    ]);
    }
}
