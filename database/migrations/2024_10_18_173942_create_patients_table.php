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
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); // This creates an unsignedBigInteger by default
            $table->string('name');
            $table->string('contact');
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female']);
            $table->unsignedBigInteger('user_id'); // Use unsignedBigInteger to match the type
            $table->foreign('user_id')->references('id')->on('user_masters')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
