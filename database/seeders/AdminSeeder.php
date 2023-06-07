<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

$user = Admin::create([
    'name' => 'omar',
    'username'=>'omar balla',
    'email' => 'omar@gmail.com',
    'password' => bcrypt('112233'),
    'com_code'=>1,
    'active'=>1
    ]);
    // $role = Role::create(['name' => 'Admin']);
    // $permissions = Permission::pluck('id','id')->all();
    // $role->syncPermissions($permissions);
    // $user->assignRole([$role->id]);

    }
}
