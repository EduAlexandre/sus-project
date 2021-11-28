<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\States;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        States::create(['name' => 'ALAGOAS', 'abbreviation' => 'AL']);
        States::create(['name' => 'AMAPÁ', 'abbreviation' => 'AP']);
        States::create(['name' => 'AMAZONAS', 'abbreviation' => 'AM']);
        States::create(['name' => 'BAHIA', 'abbreviation' => 'BA']);
        States::create(['name' => 'CEARÁ', 'abbreviation' => 'CE']);
        States::create(['name' => 'ESPÍRITO SANTO', 'abbreviation' => 'ES']);
        States::create(['name' => 'GOIÁS', 'abbreviation' => 'GO']);
        States::create(['name' => 'MARANHÃO', 'abbreviation' => 'MA']);
        States::create(['name' => 'MATO GROSSO', 'abbreviation' => 'MT']);
        States::create(['name' => 'MATO GROSSO DO SUL', 'abbreviation' => 'MS']);
        States::create(['name' => 'MINAS GERAIS', 'abbreviation' => 'MG']);
        States::create(['name' => 'PARÁ', 'abbreviation' => 'PA']);
        States::create(['name' => 'PARAÍBA', 'abbreviation' => 'PB']);
        States::create(['name' => 'PARANÁ', 'abbreviation' => 'PR']);
        States::create(['name' => 'PERNAMBUCO', 'abbreviation' => 'PE']);
        States::create(['name' => 'PIAUÍ', 'abbreviation' => 'PI']);
        States::create(['name' => 'RIO DE JANEIRO', 'abbreviation' => 'RJ']);
        States::create(['name' => 'RIO GRANDE DO NORTE', 'abbreviation' => 'RN']);
        States::create(['name' => 'RIO GRANDE DO SUL', 'abbreviation' => 'RS']);
        States::create(['name' => 'RONDÔNIA', 'abbreviation' => 'RO']);
        States::create(['name' => 'RORAIMA', 'abbreviation' => 'RR']);
        States::create(['name' => 'SANTA CATARINA', 'abbreviation' => 'SC']);
        States::create(['name' => 'SÃO PAULO', 'abbreviation' => 'SP']);
        States::create(['name' => 'SERGIPE', 'abbreviation' => 'SE']);
        States::create(['name' => 'TOCANTINS', 'abbreviation' => 'TO']);
        States::create(['name' => 'DISTRITO FEDERAL', 'abbreviation' => 'DF']);
    }
}
