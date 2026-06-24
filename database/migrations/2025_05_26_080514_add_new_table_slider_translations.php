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
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slider_id')->nullable();
            $table->string('locale',2);
            $table->string('title',255)->nullable();
            $table->string('alert_text',255)->nullable();
            $table->string('first_btn_text',255)->nullable();
            $table->string('first_btn_link',255)->nullable();
            $table->string('last_btn_text',255)->nullable();
            $table->string('last_btn_link',255)->nullable();
            $table->longText('description')->nullable();
            $table->string('slug',255)->nullable();

            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_translations');
    }
};
