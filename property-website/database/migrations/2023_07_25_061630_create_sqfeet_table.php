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
        Schema::create('sqfeet', function (Blueprint $table) {
            $table->id();
            $table->integer('sqfoot_listing')->nullable();
            $table->string('listing_id')->nullable();
            $table->string('developers_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sqfeet');
    }
};
