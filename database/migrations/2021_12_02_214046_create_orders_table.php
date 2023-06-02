<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('user_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('baptism_name')->nullable();
            $table->string('sex');
            $table->tinyInteger('yoga_year')->default(0);
            $table->string('city');
            $table->date('dob');
            $table->string('phone');
            $table->string('email')->index();
            $table->string('picture_front')->nullable();
            $table->string('picture_side')->nullable();
            $table->tinyInteger('aza')->nullable();
            $table->string('yoga_attendance')->nullable();
            $table->string('language')->nullable()->index();
            $table->tinyInteger('is_instructor')->default(0);
            $table->tinyInteger('is_in_ashram')->default(0);
            $table->string('attendance')->nullable()->comment('live, online');
            $table->integer('price')->default(0);
            $table->string('currency')->comment('RON, EUR');
            $table->string('payment')->default('cash')->comment('cash, card, transfer');
            $table->timestamp('email_sent')->nullable();
            $table->foreignId('order_status_id')
                ->nullable()
                ->index()
                ->constrained()
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->string('token')->nullable();
            $table->text('comments')->nullable();
            $table->string('mtv_code')->nullable()->index();
            $table->timestamp('code_sent_at')->nullable()->index();
            $table->timestamp('exported_at')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
