<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRole=new RoleUser();
        $role=DB::table('roles')->where('role_name','=','Admin')->first();//Get Admin Role
        $user=DB::table('users')->where('name','=','Super Admin')->first();//Get Super User
        $userRole->role_id=$role->id;
        $userRole->user_id=$user->id;
        $userRole->save();

        $userRole=new RoleUser();
        $role=DB::table('roles')->where('role_name','=','Seller')->first();//Get Seller Role
        $user=DB::table('users')->where('name','=','seller_1')->first();//Get seller User
        $userRole->role_id=$role->id;
        $userRole->user_id=$user->id;
        $userRole->save();
    }
}
