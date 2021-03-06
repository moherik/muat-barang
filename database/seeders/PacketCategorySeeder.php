<?php

namespace Database\Seeders;

use App\Models\PacketCategory;
use Illuminate\Database\Seeder;

class PacketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PacketCategory::factory()->times(100)->create();
        PacketCategory::create([
            'title' => 'Makanan & Minuman',
            'desc' => 'pengiriman kategori makanan dan minuman',
            'is_active' => 0,
        ]);
    }
}
