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
        Schema::create('kuesioner_competency', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kuesioner_work_id')->nullable(false);
            $table->string('type')->nullable(false); //graduation or company
            $table->integer('ethics')->nullable(false);
            $table->integer('expertise')->nullable(false);
            $table->integer('english')->nullable(false);
            $table->integer('tech')->nullable(false);
            $table->integer('communication')->nullable(false);
            $table->integer('teamwork')->nullable(false);
            $table->integer('development')->nullable(false);
            $table->foreign('kuesioner_work_id')->references('id')->on('kuesioner_work')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_competency');
    }
};
