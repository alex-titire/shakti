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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('baptism_name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('yoga_year')->nullable();
            $table->string('city')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('aza')->nullable();
            $table->string('yoga_attendance')->nullable();
            $table->tinyInteger('is_instructor')->default(0);
            $table->tinyInteger('is_in_ashram')->default(0);
            $table->string('language')->nullable();
            $table->tinyInteger('newsletter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'baptism_name', 'gender', 'yoga_year', 'city', 'dob', 'phone', 'aza', 'yoga_attendance', 'is_instructor', 'is_in_ashram', 'language', 'newsletter']);
        });
    }
};
