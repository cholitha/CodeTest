<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name='Super Admin';
        $user->email='admin@gmail.com';
        $user->password=Hash::make('123');
        $user->user_status=1;
        $user->save();

        $user = new User();
        $user->name='seller_1';
        $user->email='seller_1@gmail.com';
        $user->password=Hash::make('123');
        $user->user_status=1;
        $user->save();
    }
}
