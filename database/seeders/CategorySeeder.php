<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'ورزش'],
            ['id' => 2, 'name' => 'اقتصاد'],
            ['id' => 3, 'name' => 'محیط زیست'],
            ['id' => 4, 'name' => 'فرهنگ'],
            ['id' => 5, 'name' => 'تکنولوژی'],
            ['id' => 6, 'name' => 'مسافرت'],
            ['id' => 7, 'name' => 'علمی'],
        ];
        DB::table('categories')->insert($categories);
    }
}
