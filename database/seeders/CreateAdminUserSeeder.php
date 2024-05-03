<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Admin', 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456')
        ]);
  
        $role = Role::create(['name' => 'Administrativo']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);

        // Creación del rol de docente
        $roleDocente = Role::create(['name' => 'Docente']);
        // Si necesitas asignar permisos específicos puedes hacerlo aquí
        // $roleDocente->syncPermissions($permisosParaDocentes);

        $roleEstudiante = Role::create(['name' => 'Estudiante']);
        // Si necesitas asignar permisos específicos puedes hacerlo aquí
        // $roleEstudiante->syncPermissions($permisosParaEstudiantes);
    }
}
