<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'role_id'  => '1',
                'address'  => 'Mirpur 12',
                'gender'   => 'Male',
                'phone'    => '01941697253',
                'status'   => '0',
                'password' => Hash::make('admin'),
            ],[
                'name'     => 'user',
                'email'    => 'user@gmail.com',
                'role_id'  => '2',
                'address'  => 'Mirpur 12',
                'gender'   => 'Male',
                'phone'    => '01941697253',
                'status'   => '0',
                'password' => Hash::make('user'),
            ],[
                'name'     => 'Stac kHolder',
                'email'    => 'stack@gmail.com',
                'role_id'  => '3',
                'address'  => 'Mirpur 12',
                'gender'   => 'Male',
                'phone'    => '01941697253',
                'status'   => '0',
                'password' => Hash::make('stack'),
            ],
        ]);
    }
}
