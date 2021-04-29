<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'slug' => "about-us",
            'title' => "نبذة عنا",
            'content' => "<p><span style='font-size: 14.4px;'></span></p><p><span style='font-size: 14.4px;'>تطبيق إدارة محتوى من أكاديمية حسوب.<br></span><br></p>",
        ]);
    }
}
