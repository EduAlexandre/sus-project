<?php

namespace Database\Seeders;

use App\Models\Situation;
use Illuminate\Database\Seeder;

class SituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situation::create(['name' => 'ATIVO']);
        Situation::create(['name' => 'ÓBITO']);
    }
}
