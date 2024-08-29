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
        Schema::create('tutions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('tuter_id')->nullable()->constrained('users','id');
            $table->foreignId('student_id')->nullable()->constrained('users','id');
            $table->foreignId('subject_id')->nullable()->constrained('subjects','id');
            $table->text('week_days')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('duration');
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutions');
    }
};
