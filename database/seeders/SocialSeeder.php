<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            ['name'=>'Instagram','link'=>'https://www.instagram.com/tabesh.blog'],
            ['name'=>'Telegram','link'=>'https://www.web.teletram.org/tabesh.blog'],
            ['name'=>'Twitter','link'=>'https://www.twitter.com/tabesh.blog'],
        ];
        DB::table('socials')->insert($socials);
    }
}
