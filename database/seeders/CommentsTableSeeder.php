<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'body' => "شكرًا جزيلًا",
            'post_id' => "1",
            'user_id' => "2",
        ]);

        DB::table('comments')->insert([
            'body' => "مقال مفيد",
            'post_id' => "1",
            'user_id' => "3",
        ]);

        DB::table('comments')->insert([
            'body' => "مقال جيد",
            'post_id' => "2",
            'user_id' => "2",
        ]);
    }
}
