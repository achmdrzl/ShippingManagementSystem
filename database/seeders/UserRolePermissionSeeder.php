<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();

        try {
            $superadmin = User::create(array_merge([
                'email' => 'superadmin@gmail.com',
                'name' => 'Superadmin',
            ], $default_user_value));

            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'Admin',
            ], $default_user_value));

            $role_superadmin = Role::create(['name' => 'superadmin']);
            $role_admin = Role::create(['name' => 'admin']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $role_superadmin->givePermissionTo('read role', 'create role', 'update role', 'delete role');
            $role_admin->givePermissionTo('read role');

            $superadmin->assignRole('superadmin');
            $admin->assignRole('admin');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
