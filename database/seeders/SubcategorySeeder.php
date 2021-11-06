<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'category_id' => '1',
                'name'        => '10 Photo Edit',
                'price'       => '100.00'
            ],[
                'category_id' => '1',
                'name'        => '20 Photo Taken',
                'price'       => '500.00'
            ],[
                'category_id' => '2',
                'name'        => '5 Photo Edit',
                'price'       => '50.00'
            ],[
                'category_id' => '2',
                'name'        => '8 Photo Taken',
                'price'       => '50.00'
            ],[
                'category_id' => '4',
                'name'        => 'Kacci',
                'price'       => '150.00'
            ],[
                'category_id' => '4',
                'name'        => 'Firni',
                'price'       => '100.00'
            ],[
                'category_id' => '4',
                'name'        => 'Jorda',
                'price'       => '80.00'
            ]
         ]);
    }
}
