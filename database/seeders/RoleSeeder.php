<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Insert User Roles
         $role = new Role();
         $role->role_name='Admin';
         $role->save();
 
         $role = new Role();
         $role->role_name='Seller';
         $role->save();

         $role = new Role();
         $role->role_name='Customer';
         $role->save();
    }
}
