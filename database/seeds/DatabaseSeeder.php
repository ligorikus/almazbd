<?php

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
        factory(App\Models\Computer::class, 50)->create();
        factory(App\Models\Service::class, 100)->create();
    }
}
