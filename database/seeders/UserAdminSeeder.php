<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Developer',
            'username' => 'dev',
            'email' => 'dev@muatbarang.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456'),
        ]);
    }
}
