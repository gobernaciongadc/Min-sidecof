<?php

namespace Database\Seeders;

use App\Models\Minero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RocminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Minero::create([
                'rocmin' => 'P-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'nombre' => $faker->randomElement(['Caliza', 'Oro', 'Plata', 'Cobre', 'Hierro']),
                'fecha_inscripcion' => $faker->dateTimeBetween('-365 days', 'now'),
                'procedencia' => $faker->randomElement(['Oruro', 'Potosí', 'La Paz', 'Cochabamba', 'Santa Cruz']),
                'telefono' => $faker->phoneNumber,
                'users_id' => 1,
            ]);
        }
    }
}
