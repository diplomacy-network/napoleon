<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfluencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('influences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_id')->constrained()->cascadeOnDelete();
            $table->foreignId('power_id')->constrained()->cascadeOnDelete();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('influences');
    }
}
