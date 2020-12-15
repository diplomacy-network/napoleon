<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adjudication_instance_id')->constrained()->cascadeOnDelete();
            $table->string('season');
            $table->string('year');
            $table->string('type');
            $table->dateTime('started_at');
            $table->integer('length')->nullable();
            $table->boolean('adjudicated')->default(false);
            $table->foreignId('next_phase_id')->constrained('phases')->cascadeOnDelete();
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
        Schema::dropIfExists('phases');
    }
}
