<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kuesioner_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tracer_study_id')->nullable(false);
            $table->string('location')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('start_date')->nullable();
            $table->string('university_name')->nullable();
            $table->string('major')->nullable();
            $table->string('reasons')->nullable();
            $table->foreign('tracer_study_id')->references('id')->on('kuesioner')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_education');
    }
};
