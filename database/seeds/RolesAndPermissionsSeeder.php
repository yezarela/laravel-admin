<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'read_users']);
        Permission::create(['name' => 'update_users']);
        Permission::create(['name' => 'delete_users']);
        
        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->syncPermissions([
          'create_users',
          'read_users',
          'update_users',
          'delete_users'
          ]);

        $member = Role::create(['name' => 'member']);
        $member->syncPermissions(['read_users']);

        $user = User::create([
            'name' => 'Admin George',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin12345'),
        ]);

        $user->assignRole('admin');
    }
}
