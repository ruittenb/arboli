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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();

            $table->string('calling_name', 80)->default('');
            $table->string('christian_names', 200)->nullable(false)->default('');
            $table->string('middle_name', 60)->nullable(false)->default('');
            $table->string('last_name', 200)->nullable(false)->default('?');
            $table->enum('gender', config('enums.genders'))->default('UNKNOWN');
            $table->string('place_birth', 255)->default('');
            // The date columns are strings by design; we might only know a year, or a date without the year.
            $table->string('date_birth', 10)->default('');
            $table->string('place_baptized', 200)->default('');
            $table->string('date_baptized', 10)->default('');
            $table->string('place_death', 200)->default('');
            $table->string('date_death', 10)->default('');
            $table->string('cause_death', 255)->default('');
            $table->string('place_buried', 200)->default('');
            $table->string('date_buried', 10)->default('');
            // Parent FK's are overridden by a person_x_relation record for the biological parents of this person.
            $table->unsignedBigInteger('father_id')->nullable();
            $table->unsignedBigInteger('mother_id')->nullable();
            $table->foreign('father_id')->references('id')->on('persons')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('mother_id')->references('id')->on('persons')->cascadeOnUpdate()->nullOnDelete();
            $table->string('photo', 255)->nullable();
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
        Schema::dropIfExists('persons');
    }
};
