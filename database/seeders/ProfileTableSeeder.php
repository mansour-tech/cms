<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'avatar' => "defult.png",
            'website' => 'eng-mansour.com',
            'bio' => "Engineer communication ,Electronics and web design",
        ]);
    }
}
