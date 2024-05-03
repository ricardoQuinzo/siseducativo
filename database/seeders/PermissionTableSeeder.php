<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'users-list',
           'users-create',
           'users-edit',
           'users-delete',

           'courses-list',
           'courses-create',
           'courses-edit',
           'courses-delete',

           'admisiones-list',
           'admisiones-create',
           'admisiones-edit',
           'admisiones-delete',

           'mat-list',
           'mat-create',
           'mat-edit',
           'mat-delete',

           'notas-list',
           'notas-create',
           'notas-edit',
           'notas-delete',

           'mis-reportes',
           'mejores-notas'

        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
