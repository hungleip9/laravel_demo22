<?php

use Illuminate\Database\Seeder;

class DatabaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
