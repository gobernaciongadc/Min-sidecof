<?php

namespace Database\Seeders;

use App\Models\Nometalico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NometalicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Caliza";
        $nometalico->simbolo = "Caliza";
        $nometalico->alicuota = 1.2;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 2.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Yeso";
        $nometalico->simbolo = "Yeso";
        $nometalico->alicuota = 8.5;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 3.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Baritina";
        $nometalico->simbolo = "Baritina";
        $nometalico->alicuota = 7.6;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 4.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Sodalita";
        $nometalico->simbolo = "Sodalita";
        $nometalico->alicuota = 5.5;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 5.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Fosforita";
        $nometalico->simbolo = "Fosforita";
        $nometalico->alicuota = 5.5;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 6.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Sílice";
        $nometalico->simbolo = "Sílice";
        $nometalico->alicuota = 5.5;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 7.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Bentonita";
        $nometalico->simbolo = "Bentonita";
        $nometalico->alicuota = 5.5;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 8.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Puzolana";
        $nometalico->simbolo = "Puzolana";
        $nometalico->alicuota = 5.5;
        $nometalico->users_id = 1;
        $nometalico->save();

        // 9.-
        $nometalico = new Nometalico();
        $nometalico->nombre = "Arcilla";
        $nometalico->simbolo = "Arcilla";
        $nometalico->alicuota = 5.5;
        $nometalico->users_id = 1;
        $nometalico->save();
    }
}
