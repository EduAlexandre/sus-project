<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'ADMIN',
            'password' => '@sus123456',
            'email'    => 'sa@gmail.com',
            'isAdmin' => true,
            'isActive'  => true
        ]);
    }
}
