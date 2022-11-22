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
        Schema::create('person_x_relation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('relation_id');
            $table->foreign('person_id')->references('id')->on('persons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('relation_id')->references('id')->on('relations')->cascadeOnUpdate()->cascadeOnDelete();

            $table->enum('parent_type', config('enums.parent_types'))->default('UNKNOWN');
            // date_start is e.g. the date of adoption. In case of biological parents,
            // date_start need not be filled since it is stored in person.date_birth.
            $table->string('date_start', 10)->default('');
            // date_end is e.g. the date the foster care ended.
            $table->string('date_end', 10)->default('');
            $table->string('remark', 255)->default('');

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
        Schema::dropIfExists('person_x_relation');
    }
};
