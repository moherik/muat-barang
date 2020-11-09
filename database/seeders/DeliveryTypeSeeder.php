<?php

namespace Database\Seeders;

use App\Models\DeliveryType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryType::insert([
            [
                'title' => 'Motor',
                'desc' => 'Pengiriman menggunakan motor oleh kurir',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Mobil',
                'desc' => 'Pengiriman menggunakan mobil oleh kurir',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
