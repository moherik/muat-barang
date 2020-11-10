<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Developer',
            'username' => 'dev',
            'email' => 'dev@muatbarang.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Dummy User',
            'username' => 'dummyuser',
            'email' => 'dummy.user@muatbarang.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
            'phone' => '08212345678'
        ]);
        $user->assignRole('user');

        $courier = User::create([
            'name' => 'Dummy Courier',
            'username' => 'dummycourier',
            'email' => 'dummy.courier@muatbarang.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
            'phone' => '08512345678'
        ]);
        $courier->assignRole('courier');
    }
}
