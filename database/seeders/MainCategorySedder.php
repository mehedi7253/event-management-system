<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCategorySedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'package_id'     => '1',
                'category_name'  => 'Premium',
                'price'          => '5500.00',
                'description'    => '<p><strong>you will get 50 photo edit</strong></p>'
            ],[
                'package_id'     => '1',
                'category_name'  => 'Standard',
                'price'          => '2500.00',
                'description'    => '<p><strong>you will get 10 photo edit</strong></p>'
            ],[
                'package_id'     => '1',
                'category_name'  => 'General',
                'price'          => '2000.00',
                'description'    => '<p><strong>you will get 5 photo edit</strong></p>'
            ],[
                'package_id'     => '2',
                'category_name'  => 'General',
                'price'          => '4000.00',
                'description'    => '<p><strong>you will get 20 catelog</strong></p>'
            ],[
                'package_id'     => '2',
                'category_name'  => 'Standard',
                'price'          => '3500.00',
                'description'    => '<p><strong>tou will get 2prdduct</strong></p>'
            ],[
                'package_id'     => '2',
                'category_name'  => 'General',
                'price'          => '2000.00',
                'description'    => '<p><strong>tou will get 2prdduct</strong></p>'
            ]
         ]);
    }
}
