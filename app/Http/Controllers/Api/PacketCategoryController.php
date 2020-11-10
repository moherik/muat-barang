<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacketCategoryResource;
use App\Models\PacketCategory;

class PacketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PacketCategoryResource
     */
    public function index()
    {
        $record = PacketCategory::where('is_active', '>', 0)->orderBy('created_at', 'desc')->get();
        return PacketCategoryResource::collection($record);
    }
}
