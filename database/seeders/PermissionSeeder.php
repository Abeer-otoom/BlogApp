<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'update post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'show post']);
        Permission::create(['name'=>'create comment']);

        //Assign A Permission To A Role

        $role =Role::findByName('Admin');
        $role->syncPermissions([1,2,3,4]);


        $role =Role::findByName('User');
        $role->givePermissionTo([4 , 5]);


    }
}
