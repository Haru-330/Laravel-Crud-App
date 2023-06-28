<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Faker\Factory;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
    # リセット
    DB::table('students')->delete();

    # 日本語設定
    $faker = Factory::create('ja_JP');

    # サンプルデータの挿入
    for ($i = 0; $i < 10; $i++) {
        \App\Models\Student::create([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'tel' => $faker->phoneNumber(),
            'message' => $faker->text()
        ]);
    }
    }
}
