<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            [
                'package_name' => 'photography',
                'status'       => '0',
                'image'        => '1636018140.jpg'
            ],[
                'package_name' => 'catelog',
                'status'       => '0',
                'image'        => '1636020361.jpg'
            ]
         ]);
    }
}
