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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_type_id')
                ->constrained()
                ->index()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('attendance')->nullable()->comment('live, online, both');
            $table->string('title_ro');
            $table->string('title_en');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamp('registration_start')->useCurrent();
            $table->timestamp('registration_end')->nullable();
            $table->string('audience')->default('mixed')->comment('m, f, mixed'); // values: m, f, mixed
            $table->integer('price_ron')->default(0)->comment('value set in Bani, not Lei');
            $table->integer('price_eur')->default(0)->comment('value set in cents not Euros');
            $table->integer('price_online_ron')->nullable();
            $table->integer('price_online_eur')->nullable();
            $table->integer('price_coordinator_ron')->nullable();
            $table->integer('price_coordinator_eur')->nullable();
            $table->integer('price_ashram_ron')->nullable();
            $table->integer('price_ashram_eur')->nullable();
            $table->timestamp('early_bird_deadline')->useCurrent();
            $table->string('early_bird_type')->nullable()->comment('fixed, percentage');
            $table->integer('early_bird_value_ron')->nullable();
            $table->integer('early_bird_value_eur')->nullable();
            $table->text('picture_info_ro')->nullable();
            $table->text('picture_info_en')->nullable();
            $table->foreign('email_confirmation_card')->references('id')->on('notifications')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('email_confirmation_cash')->references('id')->on('notifications')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('email_confirmation_bank')->references('id')->on('notifications')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('events');
    }
};
