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
        Schema::create('banner_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id')->nullable();
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->string('special_title', 255)->nullable();
            $table->longText('text')->nullable();
            $table->longText('btn_text')->nullable();
            $table->longText('btn_link')->nullable();
            $table->longText('badge_text')->nullable();

            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_translations');
    }
};
