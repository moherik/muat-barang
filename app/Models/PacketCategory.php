<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacketCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getIconTagAttribute()
    {
        $icon = $this->attributes['icon'];
        if ($icon != "" || $icon != null) {
            return '<img src="' . asset('storage/images/packet-category-icon/' . $icon) . '" class="img" width="32" height="32" />';
        } else {
            return '<span class="iconify" data-icon="mdi:cube-scan" data-inline="false" data-width="32" data-height="32"></span>';
        }
    }

    public function getActiveBadgeAttribute()
    {
        if ($this->attributes['is_active']) {
            return '<span class="badge badge-primary">Aktif</span>';
        } else {
            return '<span class="badge badge-secondary">Non-Aktif</span>';
        }
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
