<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'receiver_name' => $this->receiver_name,
            'receiver_phone' => $this->receiver_phone,
            'location_latlong' => $this->location_latlong,
            'location_detail' => $this->location_detail,
            'delivery_desc' => $this->delivery_desc,
            'sort_order' => $this->sort_order,
            'created_at' => $this->created_at,
        ];
    }
}
