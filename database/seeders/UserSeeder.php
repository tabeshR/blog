<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name'=>'تابش','email'=>'tabesh.rouhani73@gmail.com','password'=>bcrypt('123456789'),'email_verified_at'=>Carbon::now()]
        ];
        DB::table('users')->insert($users);
    }
}
