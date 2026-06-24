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
        Schema::create('settings_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('settings_id');
            $table->foreign('settings_id')->references('id')->on('settings')->onDelete('cascade');
            $table->string('site_title')->nullable();
            $table->text('site_desc')->nullable();
            $table->text('site_keywords')->nullable();
            $table->string('slogan')->nullable();
            $table->string('address')->nullable();
            $table->string('copyrights')->nullable();
            $table->string('locale')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_translations');
    }
};
