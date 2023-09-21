<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // User Model
        Permission::create(['name' => 'create-user', 'display_name' => 'Create User', 'type' => 'User Management']);
        Permission::create(['name' => 'edit-user', 'display_name' => 'Edit User', 'type' => 'User Management']);
        Permission::create(['name' => 'delete user', 'display_name' => 'Delete User', 'type' => 'User Management']);
        Permission::create(['name' => 'view user', 'display_name' => 'View User', 'type' => 'User Management']);

        // Role Model
        Permission::create(['name' => 'create-role', 'display_name' => 'Create Role', 'type' => 'Role Management']);
        Permission::create(['name' => 'edit-role', 'display_name' => 'Edit Role', 'type' => 'Role Management']);
        Permission::create(['name' => 'delete-role', 'display_name' => 'Delete Role', 'type' => 'Role Management']);
        Permission::create(['name' => 'view-role', 'display_name' => 'View Role', 'type' => 'Role Management']);

        // Permission Model
        Permission::create(['name' => 'create-permission', 'display_name' => 'Create Permission', 'type' => 'Permission Management']);
        Permission::create(['name' => 'edit-permission', 'display_name' => 'Edit Permission', 'type' => 'Permission Management']);
        Permission::create(['name' => 'delete-permission', 'display_name' => 'Delete Permission', 'type' => 'Permission Management']);
        Permission::create(['name' => 'view-permission', 'display_name' => 'View Permission', 'type' => 'Permission Management']);

        // Create Roles
        $supper_admin = Role::create(['name' => 'supper_admin', 'display_name' => 'Supper Admin']);
        $staff = Role::create(['name' => 'staff', 'display_name' => 'Staff']);
        $user = Role::create(['name' => 'user', 'display_name' => 'User']);

        $supper_admin->givePermissionTo(Permission::all());

        // Assign Role to User
        $supper_admin_user = \App\Models\User::find(1);
        $supper_admin_user->assignRole('supper_admin');

        $staff_user = \App\Models\User::find(2);
        $staff_user->assignRole('staff');

        $user_user = \App\Models\User::find(3);
        $user_user->assignRole('user');
    }
}
