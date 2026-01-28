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
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title', 100)->nullable();
            $table->string('ban_subtitle', 500)->nullable();
            $table->string('ban_btn', 50)->nullable();
            $table->string('ban_url', 200)->nullable();
            $table->string('ban_status', 200)->default(1);
            $table->string('ban_slug')->nullable();
            $table->string('ban_creator', 200)->nullable();
            $table->string('ban_editor', 200)->nullable();
            $table->string('ban_image', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
