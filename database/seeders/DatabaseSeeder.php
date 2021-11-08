<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\EventController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(MainCategorySedder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(EventSeeder::class);
    }
}
