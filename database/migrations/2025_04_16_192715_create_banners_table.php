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
            $table->id();
            $table->string('page')->nullable();
            $table->string('greeting')->nullable();
            $table->string('site_name')->nullable();
            $table->string('banner')->nullable();
            $table->string('banner_description')->nullable();
            $table->string('banner_link')->nullable();
            $table->string('link_text')->nullable();
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
