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
        Schema::create('kuesioner_work', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tracer_study_id')->nullable(false);
            $table->integer('job_position')->nullable();
            $table->integer('job_acquired_time')->nullable(false)->default(0);
            $table->string('company')->nullable();
            $table->string('salary')->nullable();
            $table->string('company_province')->nullable();
            $table->string('company_regency')->nullable();
            $table->string('company_type')->nullable();
            $table->string('company_level')->nullable();
            $table->integer('university_company_relation')->nullable();
            $table->integer('university_company_level')->nullable();
            $table->integer('applied_company')->nullable();
            $table->integer('applied_company_responded')->nullable();
            $table->integer('applied_company_interviewed')->nullable();
            $table->string('job_hunting_status')->nullable();
            $table->string('job_hunt_type')->nullable();
            $table->integer('job_hunt_month')->nullable();
            $table->foreign('tracer_study_id')->references('id')->on('kuesioner')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_work');
    }
};
