<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'courier',
                'guard_name' => 'web',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
