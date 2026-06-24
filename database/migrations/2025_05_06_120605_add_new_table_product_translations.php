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
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('locale',2);
            $table->string('name',255)->nullable();
            $table->string('slug',255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('information')->nullable();
            $table->string('page_title', 255)->nullable();
            $table->string('page_keywords', 255)->nullable();
            $table->longText('page_description')->nullable();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_translations');
    }
};
