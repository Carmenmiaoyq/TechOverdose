<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'update-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'edit-acc']);
        Permission::create(['name' => 'delete-acc']);
        Permission::create(['name' => 'set-best-reply']);

        // super-admin given all permissions with Gate::before (AuthServiceProvider)
        Role::create(['name' => 'super-admin']);
        $regular_role = Role::create(['name' => 'regular']);

        // Conditions checked in Policies
        $regular_role->givePermissionTo(Permission::all() );
    }
}
