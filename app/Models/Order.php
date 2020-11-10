<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function packetCategory()
    {
        return $this->hasOne(PacketCategory::class, 'id', 'delivery_type_id');
    }

    public function deliveryType()
    {
        return $this->hasOne(DeliveryType::class, 'id', 'delivery_type_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
