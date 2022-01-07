<?php

namespace Database\Seeders;

use App\Models\Neoplasm;
use Illuminate\Database\Seeder;

class NeoplasmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Neoplasm::create(['name' => 'NÃO']);
        Neoplasm::create(['name' => 'ESTÔMAGO - C16']);
        Neoplasm::create(['name' => 'LARINGE-C16']);
        Neoplasm::create(['name' => 'MESOTELIOMA DE PERITÔNIO']);
        Neoplasm::create(['name' => 'MESOTELIOMA DE PERICARDIO']);
    }
}
