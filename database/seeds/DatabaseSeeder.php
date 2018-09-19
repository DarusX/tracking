<?php

use Illuminate\Database\Seeder;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Role::create([
            'role' => 'Administrador'
        ])->users()->create([
            'name' => 'Administrador',
            'surname' => 'Tracking',
            'phone' => '',
            'address' => '',
            'email' => 'admin@tracking.com',
            'password' => bcrypt('123456')
        ]);
    }
}
