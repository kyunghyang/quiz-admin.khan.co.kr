<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "name" => "신형준",
            "contact" => "01030217486",
            "email" => "ssa4141@naver.com",
            "master" => true,
            "accepted" => true,
            "password" => Hash::make("shin1109")
        ]);

        Admin::create([
            "name" => "관리자",
            "contact" => "000",
            "email" => "admin@naver.com",
            "master" => false,
            "accepted" => true,
            "password" => Hash::make("admin@naver.com")
        ]);
    }
}
