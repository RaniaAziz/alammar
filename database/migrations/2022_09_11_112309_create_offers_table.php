<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_no')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('poster_id')->nullable();
            $table->foreign('poster_id')->references('id')->on('posters');
            $table->enum('order_type',['rent','real_estate'])->default('rent')->nullable();
            $table->enum('real_estate_type',['flat','fella','land','rest'])->default('flat')->nullable();
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->double('space')->nullable();
            $table->double('price')->nullable();
            $table->string('soum')->nullable();
            $table->string('limit')->nullable();
            $table->string('no_planned')->nullable();
            $table->string('no_piece')->nullable();
            $table->text('details')->nullable();
            $table->string('instrument_image')->nullable();
            $table->enum('mediator',['direct','not_direct'])->default('direct')->nullable();
            $table->enum('status',['new','received','finished'])->default('new')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
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
        Schema::dropIfExists('offers');
    }
}
