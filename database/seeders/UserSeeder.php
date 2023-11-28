<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Permissions
        $permissions = [
            // Pengguna
            ['guard_name' => 'web', 'name' => 'index-user'],
            ['guard_name' => 'web', 'name' => 'create-user'],
            ['guard_name' => 'web', 'name' => 'edit-user'],
            ['guard_name' => 'web', 'name' => 'destroy-user'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // create Roles
        $roles = [
            ['guard_name' => 'web', 'name' => 'Admin'],
            ['guard_name' => 'web', 'name' => 'Petugas'],
        ];

        foreach ($roles as $role) {
            $created_role = Role::create($role);
        }

        // Create Users
        $users = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('password'),
            ],
            [
                'nama' => 'Petugas',
                'username' => 'petugas',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            $created_user = User::create($user);
            $created_user->assignRole($created_user->nama);
        }
    }
}
