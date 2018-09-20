<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Status;

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
            'role' => 'Administrator'
        ])->users()->create([
            'name' => 'Administrator',
            'surname' => 'Tracking',
            'phone' => '',
            'address' => '',
            'email' => 'admin@tracking.com',
            'password' => '123456'
        ]);
        Role::create([
            'role' => 'Client'
        ]);
        Role::create([
            'role' => 'Worker'
        ]);

        Status::create([
            'status' => 'Esperando'
        ]);
        Status::create([
            'status' => 'Reparando'
        ]);
        Status::create([
            'status' => 'Almacenado'
        ]);
        Status::create([
            'status' => 'Entregado'
        ]);
        Status::create([
            'status' => 'Finalizado'
        ]);
    }
}
