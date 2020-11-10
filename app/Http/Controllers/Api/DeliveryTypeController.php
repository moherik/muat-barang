<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeliveryTypeResource;
use App\Models\DeliveryType;

class DeliveryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = DeliveryType::where('is_active', '>', 0)->orderBy('created_at', 'desc')->get();
        return DeliveryTypeResource::collection($record);
    }
}
