<?php

namespace Database\Seeders;

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

        DB::table('categories')->insert([
            'title' => 'Дизайн'
        ]);

        DB::table('categories')->insert([
            'title' => 'Создание сайтов'
        ]);

        DB::table('categories')->insert([
            'title' => 'Программирование'
        ]);

        DB::table('categories')->insert([
            'title' => 'Фотография'
        ]);

        DB::table('categories')->insert([
            'title' => 'Копирайтинг'
        ]);
    }
}
