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
        Schema::create('tution_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tution_id')->constranied()->onDelete('cascade');
            $table->foreignId('user_id')->constranied()->onDelete('cascade');
            $table->foreignId('tutor_id')->constranied('users')->onDelete('cascade');
            $table->timestamp('applied_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tution_applications');
    }
};
