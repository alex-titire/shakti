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
        Schema::create('event_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')
                ->index()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('key')->index();
            $table->string('title_ro')->nullable();
            $table->string('title_en')->nullable();
            $table->string('meta_title_ro')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('content_ro')->nullable();
            $table->text('content_en')->nullable();
            $table->string('url_ro')->nullable();
            $table->string('url_en')->nullable();
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
        Schema::dropIfExists('event_pages');
    }
};
