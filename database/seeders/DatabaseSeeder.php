<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Se va a ejecutar en este orden
        $this->call([
            RoleSeeder::class,
            MetalicoSeeder::class,
            NometalicoSeeder::class,
            MunicipiosSeeder::class,
            FuncionarioSeeder::class,
            // RocminSeeder::class
        ]);
    }
}