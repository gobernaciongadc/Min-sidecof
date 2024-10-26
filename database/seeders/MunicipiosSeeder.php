<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1.-
        $municipio = new Municipio();
        $municipio->codigo = 30010;
        $municipio->municipio = "Cochabamba";
        $municipio->users_id = 1;
        $municipio->save();

        // 2.-
        $municipio = new Municipio();
        $municipio->codigo = 30212;
        $municipio->municipio = "Aiquile";
        $municipio->users_id = 1;
        $municipio->save();

        // 3.-
        $municipio = new Municipio();
        $municipio->codigo = 30225;
        $municipio->municipio = "Pasorapa";
        $municipio->users_id = 1;
        $municipio->save();

        // 4.-
        $municipio = new Municipio();
        $municipio->codigo = 30238;
        $municipio->municipio = "Omereque";
        $municipio->users_id = 1;
        $municipio->save();

        // 5.-
        $municipio = new Municipio();
        $municipio->codigo = 30313;
        $municipio->municipio = "Ayopaya";
        $municipio->users_id = 1;
        $municipio->save();

        // 6.-
        $municipio = new Municipio();
        $municipio->codigo = 30326;
        $municipio->municipio = "Morochata";
        $municipio->users_id = 1;
        $municipio->save();

        // 7.-
        $municipio = new Municipio();
        $municipio->codigo = 30339;
        $municipio->municipio = "Cocapata";
        $municipio->users_id = 1;
        $municipio->save();

        // 8.-
        $municipio = new Municipio();
        $municipio->codigo = 30414;
        $municipio->municipio = "Tarata";
        $municipio->users_id = 1;
        $municipio->save();

        // 9.-
        $municipio = new Municipio();
        $municipio->codigo = 30427;
        $municipio->municipio = "Villa Anzaldo";
        $municipio->users_id = 1;
        $municipio->save();

        // 10.-
        $municipio = new Municipio();
        $municipio->codigo = 30430;
        $municipio->municipio = "Arbieto";
        $municipio->users_id = 1;
        $municipio->save();

        // 11.-
        $municipio = new Municipio();
        $municipio->codigo = 30443;
        $municipio->municipio = "Sacabamba";
        $municipio->users_id = 1;
        $municipio->save();
    }
}
