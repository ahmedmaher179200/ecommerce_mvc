<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //role seeder
        $super_admin = Role::create([
            'name'          => 'super_admin',
            'display_name'  => 'super admin',
            'description'   => 'can do any thing',
        ]);


        //permission
        $rols = ["admins", "categores", "products" ,"reviews", "orders"];

        foreach($rols as $rol){
            $create = Permission::create([
                'name'          => 'create-' . $rol,
                'display_name'  => 'Create' . $rol,
                'description'   => 'create new' .$rol,
            ]);

            $edit = Permission::create([
                'name'          => 'edit-' . $rol,
                'display_name'  => 'edit ' . $rol,
                'description'   => 'edit ' . $rol,
            ]);

            $update = Permission::create([
                'name'          => 'update-' . $rol,
                'display_name'  => 'update ' . $rol,
                'description'   => 'update ' . $rol,
            ]);

            $delete = Permission::create([
                'name'          => 'delete-' . $rol,
                'display_name'  => 'delete ' . $rol,
                'description'   => 'delete ' . $rol,
            ]);

            //add to permission_role
            $super_admin->attachPermissions([$create, $edit, $update, $delete]);
        }
    }
}
