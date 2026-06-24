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
        Schema::create('option_group_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('option_group_id')->nullable();
            $table->string('locale',2);
            $table->string('name',255)->nullable();
            $table->string('slug',255)->nullable();

            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->longText('description')->nullable();

            $table->foreign('option_group_id')->references('id')->on('option_groups')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_group_translations');
    }
};
