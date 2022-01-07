<?php

namespace Database\Seeders;

use App\Models\Sinan;
use Illuminate\Database\Seeder;

class SinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sinan::create(['name' => 'NÃO']);
        Sinan::create(['name' => 'ACIDENTE DE TRABALHO GRAVE']);
        Sinan::create(['name' => 'CÂNCER RELACIONADO AO TRABALHO']);
        Sinan::create(['name' => 'DERMATOSE OCUPACIONAL']);
        Sinan::create(['name' => 'LER/DORT']);
        Sinan::create(['name' => 'PNEUMOCORIOSE']);
        Sinan::create(['name' => 'TRANSTORNO MENTAL']);
        Sinan::create(['name' => 'PAIR']);
        Sinan::create(['name' => 'OUTROS']);
    }
}
