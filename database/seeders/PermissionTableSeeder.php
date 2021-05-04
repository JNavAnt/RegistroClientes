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
            /*'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'report-list',
            'report-create',
            'report-edit',
            'report-delete',*/
            'Crear usuario',
            'Mostrar usuario',
            'Editar usuario',
            'Borrar usuario',
            'Crear rol',
            'Mostrar rol',
            'Editar rol',
            'Borrar rol',
            'Crear cliente',
            'Mostrar cliente',
            'Editar cliente',
            'Borrar cliente',
            'Crear reporte',
            'Mostrar reporte',
            'Editar reporte',
            'Borrar reporte',

        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}