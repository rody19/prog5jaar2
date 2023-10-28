<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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

        $Bezoeker = User::factory()->create([
            'name' => 'bezoeker',
            'email' => 'bezoeker@gmail.com',
            'password' => Hash::make('bezoeker')
        ]);

        $Admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('admin')
        ]);

    }
}
