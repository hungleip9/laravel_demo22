<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert(
            [
                [
                    'name' => 'Com',
                ],
                [
                    'name' => 'Banh',
                ],
                [
                    'name' => 'Ga ran',
                ],
                [
                    'name' => 'Nuoc giai khat',
                ]
            ]

        );
    }
}
