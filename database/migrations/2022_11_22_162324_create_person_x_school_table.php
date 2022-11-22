<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_x_school', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('school_id');
            $table->foreign('person_id')->references('id')->on('persons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('school_id')->references('id')->on('schools')->cascadeOnUpdate()->cascadeOnDelete();

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
        Schema::dropIfExists('person_x_school');
    }
};
