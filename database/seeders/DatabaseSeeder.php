<?php

namespace Database\Seeders;


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
        $this->call(StatesSeeder::class);
        $this->call(SituationSeeder::class);
        $this->call(CatSeeder::class);
        $this->call(NeoplasmSeeder::class);
        $this->call(SinanSeeder::class);
        $this->call(AdminUserSeeder::class);
    }
}
