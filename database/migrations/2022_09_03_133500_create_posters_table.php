<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters', function (Blueprint $table) {
            $table->id();
            $table->string('poster_no')->nullable();
            $table->enum('size',['S','M','L','XL'])->default('S')->nullable();
            $table->enum('type',['for_rent','for_sale','for_waive','wanted'])->default('for_rent')->nullable();
            $table->enum('status',['new','old','missing','archived'])->default('new')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('posters');
    }
}
