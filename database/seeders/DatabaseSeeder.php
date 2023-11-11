<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::create([
            'name' => 'Hardik Savani', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);
      
        $role = Role::create(['name' => 'Admin']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
    }
}
