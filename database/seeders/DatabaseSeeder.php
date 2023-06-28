<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
    # StudentsTableSeeder を呼び出すよう登録
    $this->call(StudentsTableSeeder::class);
    }
}
