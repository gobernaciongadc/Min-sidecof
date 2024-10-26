<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1.-
        $funcionario = new Funcionario();
        $funcionario->nombres = "Admin";
        $funcionario->carnet = "6406766";
        $funcionario->cargo = "Profesional II";
        $funcionario->direccion = "Valverde #3256";
        $funcionario->telefono = "79689859";
        $funcionario->email = "admin@gmail.com";
        $funcionario->user_active = 1;
        $funcionario->users_id = 1;
        $funcionario->save();
    }
}
