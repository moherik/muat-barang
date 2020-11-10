<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'sender_name' => $this->sender_name,
            'sender_phone' => $this->sender_phone,
            'packet_image' => $this->packet_image,
            'location_latlong' => $this->location_latlong,
            'location_detail' => $this->location_detail,
            'packet_desc' => $this->packet_desc,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'delivery_type' => [
                'id' => $this->deliveryType->id,
                'title' => $this->deliveryType->title,
            ],
            'packet_category' => [
                'id' => $this->packetCategory->id,
                'title' => $this->packetCategory->title,
            ],
            'created_at' => $this->created_at,
        ];
    }
}
