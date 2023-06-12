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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['baptism_name', 'sex', 'yoga_year', 'city', 'dob', 'aza', 'yoga_attendance', 'language', 'is_instructor', 'is_in_ashram']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('baptism_name')->nullable();
            $table->string('sex');
            $table->tinyInteger('yoga_year')->default(0);
            $table->string('city');
            $table->date('dob');
            $table->tinyInteger('aza')->nullable();
            $table->string('yoga_attendance')->nullable();
            $table->string('language')->nullable()->index();
            $table->tinyInteger('is_instructor')->default(0);
            $table->tinyInteger('is_in_ashram')->default(0);
        });
    }
};
