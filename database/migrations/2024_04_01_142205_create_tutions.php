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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_type_id')->constrained()->onDelete('cascade');
            $table->integer('no_of_stu');
            $table->string('salary')->nullable();
            $table->string('location');
            $table->text('description')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('experience');
            
            
            $table->string('gurdian_name');
            $table->string('gurdian_location')->nullable();
            $table->string('gurdian_number');

            
            
            
            
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
