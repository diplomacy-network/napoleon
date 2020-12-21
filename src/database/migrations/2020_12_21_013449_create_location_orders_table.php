<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('orderable_id');
            $table->string('orderable_type');
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
        Schema::dropIfExists('location_orders');
    }
}
