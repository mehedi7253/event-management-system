<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'event_name'  => 'Khamar Bari',
                'Location'    => 'Farmgate',
                'description' => 'test,testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',
                'image'       => 'event.jpg',
                'status'      => '0'
            ],[
                'event_name'  => 'Dhanmondi Lake Tour',
                'Location'    => 'Dhanmondi 32',
                'description' => 'test,testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',
                'image'       => 'event.jpg',
                'status'      => '0'
            ],[
                'event_name'  => 'Test',
                'Location'    => 'test',
                'description' => 'test,testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest',
                'image'       => 'event.jpg',
                'status'      => '0'
            ]
           
        ]);
    }
}
