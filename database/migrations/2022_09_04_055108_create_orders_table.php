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
            $table->string('order_no')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->enum('order_type',['rent','real_estate'])->default('rent')->nullable();
            $table->enum('real_estate_type',['flat','fella','land','rest'])->default('flat')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->double('space_from')->nullable();
            $table->double('space_to')->nullable();
            $table->double('price_from')->nullable();
            $table->double('price_to')->nullable();
            $table->text('details')->nullable();
            $table->enum('status',['new','received','finished'])->default('new')->nullable();
            $table->softDeletes();
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
