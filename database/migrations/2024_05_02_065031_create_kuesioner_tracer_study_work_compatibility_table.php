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
        Schema::create('kuesioner_work_compatibility', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kuesioner_work_id')->nullable(false);
            $table->string('compatibility_type')->nullable();
            $table->string('compatibility')->nullable();
            $table->foreign('kuesioner_work_id')->references('id')->on('kuesioner_work')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner_work_compatibility');
    }
};
