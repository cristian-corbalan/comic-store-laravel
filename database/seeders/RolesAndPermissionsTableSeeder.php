<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsTableSeeder extends Seeder
{
    private $usersModel= 'App\Models\User';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'super_admin',
                'description' => 'Administrador superior a todos los roles del sitio web, teniendo acceso a todas las funcionalidades de este, incluso superior a los administradores del sitio',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'description' => 'El rol de usuario más poderoso siendo superado por el Super Administrador, tiene acceso a casi todo',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'default',
                'description' => 'Usuario por defecto cuando alguien se registra en el sitio web',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'shop_manager',
                'description' => 'Rol que permite administrar todo los relacionado con los productos de la tienda',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'view control panel',
                'description' => 'Permiso para acceder al panel de control de la tienda',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'create comics',
                'description' => 'Permiso para añadir un nuevo comic a la tienda',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'edit comics',
                'description' => 'Permiso para editar un comic de la tienda',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'delete comics',
                'description' => 'Permiso para eliminar un comic de la tienda',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'view users',
                'description' => 'Permiso para visualizar los usuarios de la tienda',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('role_has_permissions')->insert([
            // Super Admin
            [
                'role_id' => 1,
                'permission_id' => 1,
            ],
            [
                'role_id' => 1,
                'permission_id' => 2,
            ],
            [
                'role_id' => 1,
                'permission_id' => 3,
            ],
            [
                'role_id' => 1,
                'permission_id' => 4,
            ],
            [
                'role_id' => 1,
                'permission_id' => 5,
            ],
            // Admin
            [
                'role_id' => 2,
                'permission_id' => 1,
            ],
            [
                'role_id' => 2,
                'permission_id' => 2,
            ],
            [
                'role_id' => 2,
                'permission_id' => 3,
            ],
            [
                'role_id' => 2,
                'permission_id' => 4,
            ],
            [
                'role_id' => 2,
                'permission_id' => 5,
            ],
            // Shop Manager
            [
                'role_id' => 4,
                'permission_id' => 1,
            ],
            [
                'role_id' => 4,
                'permission_id' => 2,
            ],
            [
                'role_id' => 4,
                'permission_id' => 3,
            ],
            [
                'role_id' => 4,
                'permission_id' => 4,
            ],
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => $this->usersModel,
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => $this->usersModel,
                'model_id' => 2,
            ],
            [
                'role_id' => 3,
                'model_type' => $this->usersModel,
                'model_id' => 3,
            ],
            [
                'role_id' => 4,
                'model_type' => $this->usersModel,
                'model_id' => 4,
            ],
        ]);
    }
}
