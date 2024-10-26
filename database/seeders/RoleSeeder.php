<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'ruim']);
        $role3 = Role::create(['name' => 'funcionario']);
        $role4 = Role::create(['name' => 'seguimiento']);

        $usuario1 = User::create(['name' => 'admin', 'id_login' => 1, 'name_bd' => 'funcionarios', 'roles_id' => '1', 'email' => 'admin', 'password' => '12345']);
        // $usuario2 = User::create(['name' => 'david', 'id_login' => 1, 'name_bd' => 'mineros', 'rol' => '2', 'email' => 'david@gmail.com', 'password' => '12345']);
        // $usuario3 = User::create(['name' => 'evert', 'id_login' => 1, 'name_bd' => 'mineros', 'rol' => '3', 'email' => 'evert@gmail.com', 'password' => '12345']);
        // $usuario4 = User::create(['name' => 'rodrigo', 'id_login' => 1, 'name_bd' => 'empresas', 'rol' => '3', 'email' => 'rodrigo@gmail.com', 'password' => '12345']);


        $usuario1->assignRole($role1);
        // $usuario2->assignRole($role2);
        // $usuario3->assignRole($role3);
        // $usuario4->assignRole($role3);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.municipios.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.municipios.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.municipios.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.municipios.destroy'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'admin.funcionarios.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.funcionarios.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.funcionarios.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.funcionarios.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.metalicos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.metalicos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.metalicos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.metalicos.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.buscaralicuotametalico'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.nometalicos.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.nometalicos.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.nometalicos.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.nometalicos.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.buscaralicuotanometalico'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.empresas.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empresas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empresas.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empresas.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.indexminerales'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.verdocumentopd'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.pdfruim'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.mineros.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.mineros.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.mineros.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.mineros.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.verdocumentopdfminero'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.formularios.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.formularios.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.formularios.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.formularios.destroy'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.staging'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.emitidos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.observacion'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.buscarFormulario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.updateObservacion'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.updated_staging'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.prueba_pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.gestionbuscar'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.datosgestionbuscar'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.actividad'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.datosactividad'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.storeactividad'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'admin.gestionbuscarubicacion'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.datosgestionbuscarubicacion'])->syncRoles([$role1, $role2, $role3, $role4]);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.indexusuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.habilitaruser'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.viewpassword'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.changespassword'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.gestionbuscarfinalizar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.datosgestionbuscarfinalizar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.finalizarformulario'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.cantidadformularios'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.resultadosreporteuno'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.pdfreporteuno'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.cantidadformulariosmunicipio'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.resultadosreporteunomunicipio'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.pdfreporteunomunicipio'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.cantidadformulariosanio'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.resultadosreporteunoanio'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.pdfreporteunoanio'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.cantidadformulariosmineral'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.resultadosreporteunomineral'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.pdfreporteunomineral'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.pdf'])->syncRoles([$role1, $role3]);
    }
}
