<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('packet_image')->nullable();
            $table->string('location_latlong');
            $table->mediumText('location_detail')->nullable();
            $table->mediumText('packet_desc')->nullable();
            $table->foreignId('packet_category_id')->constrained('packet_categories');
            $table->string('total_price');
            $table->enum('status', [
                'PENDING',
                'DELIVER',
                'DELIVERED',
            ])->default('PENDING');
            $table->foreignId('delivery_type_id')->constrained('delivery_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
