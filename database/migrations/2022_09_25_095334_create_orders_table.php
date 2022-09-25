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
            $table->foreignId('user_id');
            $table->string('first_name', 160);
            $table->string('last_name', 160);
            $table->string('address', 70);
            $table->string('city', 40);
            $table->string('state', 40);
            $table->string('postal_code', 10);
            $table->string('country', 70);
            $table->string('phone', 24);
            $table->string('email');
            $table->decimal('total', $precision = 10, $scale = 2);
            $table->string('payment_transaction_id');
            $table->boolean('has_been_shipped');
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
