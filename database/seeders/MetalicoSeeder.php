<?php

namespace Database\Seeders;

use App\Models\Metalico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetalicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1.-
        $metalico = new Metalico();
        $metalico->nombre = "Oro";
        $metalico->simbolo = "Au";
        $metalico->alicuota = 6.5;
        $metalico->users_id = 1;
        $metalico->save();

        // 2.-
        $metalico = new Metalico();
        $metalico->nombre = "Zinc";
        $metalico->simbolo = "Zn";
        $metalico->alicuota = 5.5;
        $metalico->users_id = 1;
        $metalico->save();

        // 3.-
        $metalico = new Metalico();
        $metalico->nombre = "Lead";
        $metalico->simbolo = "Pb";
        $metalico->alicuota = 4.3;
        $metalico->users_id = 1;
        $metalico->save();

        // 4.-
        $metalico = new Metalico();
        $metalico->nombre = "Plata";
        $metalico->simbolo = "Ag";
        $metalico->alicuota = 3.2;
        $metalico->users_id = 1;
        $metalico->save();

        // 5.-
        $metalico = new Metalico();
        $metalico->nombre = "Estaño";
        $metalico->simbolo = "Sn";
        $metalico->alicuota = 5.5;
        $metalico->users_id = 1;
        $metalico->save();

        // 6.-
        $metalico = new Metalico();
        $metalico->nombre = "Antimonio";
        $metalico->simbolo = "Sb";
        $metalico->alicuota = 5.5;
        $metalico->users_id = 1;
        $metalico->save();

        // 7.-
        $metalico = new Metalico();
        $metalico->nombre = "Hierro";
        $metalico->simbolo = "Fe";
        $metalico->alicuota = 5.5;
        $metalico->users_id = 1;
        $metalico->save();


        // 8.-
        $metalico = new Metalico();
        $metalico->nombre = "Wolframio";
        $metalico->simbolo = "Wo";
        $metalico->alicuota = 5.5;
        $metalico->users_id = 1;
        $metalico->save();

        // 9.-
        $metalico = new Metalico();
        $metalico->nombre = "Cobre";
        $metalico->simbolo = "Cu";
        $metalico->alicuota = 5.5;
        $metalico->users_id = 1;
        $metalico->save();
    }
}
