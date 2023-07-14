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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('from_name');
            $table->string('subject_ro');
            $table->string('subject_en');
            $table->text('content_html_ro');
            $table->text('content_html_en');
            $table->text('content_text_ro');
            $table->text('content_text_en');
            $table->tinyInteger('active')->index()->default(0);
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
        Schema::dropIfExists('notifications');
    }
};
