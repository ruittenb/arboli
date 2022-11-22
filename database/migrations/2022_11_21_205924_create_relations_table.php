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
        Schema::create('relations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('partner1_id')->nullable();
            $table->unsignedBigInteger('partner2_id')->nullable();
            $table->foreign('partner1_id')->references('id')->on('persons')->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('partner2_id')->references('id')->on('persons')->cascadeOnUpdate()->nullOnDelete();
            $table->enum('type', config('enums.relationship_types'))->default('UNKNOWN');
            // last names used when in the relationship
            $table->string('married_name1', 200)->default('');
            $table->string('married_name2', 200)->default('');
            $table->string('place_start', 100)->default('');
            // The date columns are strings by design; we might only know a year, or a date without the year.
            $table->string('date_start', 10)->default('');
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
        Schema::dropIfExists('relations');
    }
};
