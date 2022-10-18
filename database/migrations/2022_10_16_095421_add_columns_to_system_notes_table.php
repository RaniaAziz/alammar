<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSystemNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_notes', function (Blueprint $table) {

            $table->unsignedBigInteger('offer_id')->nullable()->after('order_id');
            $table->foreign('offer_id')->references('id')->on('offers');

            $table->enum('type',['order','offer'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_notes', function (Blueprint $table) {
            //
        });
    }
}
