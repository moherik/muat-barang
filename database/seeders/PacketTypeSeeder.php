<?php

namespace Database\Seeders;

use App\Models\PacketType;
use Illuminate\Database\Seeder;

class PacketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PacketType::factory()->times(100)->create();
    }
}
