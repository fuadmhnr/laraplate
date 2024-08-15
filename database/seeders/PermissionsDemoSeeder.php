<?php

namespace Database\Seeders;

use App\Models\User;
use App\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create todos']);
        Permission::create(['name' => 'list todos']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => RolesEnum::WRITER]);
        $role1->givePermissionTo([
            'create todos',
            'list todos',
        ]);

        $role2 = Role::create(['name' => RolesEnum::ADMIN]);
        $role2->givePermissionTo([
            'list todos',
        ]);

        $role3 = Role::create(['name' => RolesEnum::SUPERADMIN]);

        // Create Demo Users
        $user = User::factory()->create([
            'name' => 'Super Administrator',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($role3);

        $user = User::factory()->create([
            'name' => 'Fuad Muhammad Nur',
            'email' => 'fuadmhnr@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($role2);

        $user = User::factory()->create([
            'name' => 'Zulfikar Ali Muzakkir',
            'email' => 'zulfikar@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole($role1);
    }
}
