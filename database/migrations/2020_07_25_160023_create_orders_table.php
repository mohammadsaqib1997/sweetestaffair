<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('customer_name', 150);
            $table->string('customer_phone', 50);
            $table->string('customer_email', 150);
            $table->string('customer_address')->nullable();
            $table->mediumText('customer_message')->nullable();
            $table->bigInteger('product_id', false, true);
            $table->json('product_options')->nullable();
            $table->string('selected_zone', 50)->nullable();
            $table->enum('delivery_type', ['Deliver', 'Pickup']);
            $table->bigInteger('delivery_charges', false, true)->default(0);
            $table->double('online_charges', 22, 2)->default(0.00);
            $table->bigInteger('base_price', false, true);
            $table->mediumInteger('qty', false, true);
            $table->double('total_price', 22, 2);
            $table->tinyInteger('order_status')->default(0);
            $table->date('deliver_date');
            $table->string('deliver_time', 50);
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
