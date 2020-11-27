<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for ($i=1;$i<=8;$i++){


            DB::table('products')->insert(
                [
                    'name' => 'sanpham'.$i,
                    'status' =>$i,
                    'category_id' => '1'
                ]);
        }
    }
}
