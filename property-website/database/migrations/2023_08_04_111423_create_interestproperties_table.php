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
        Schema::create('interestproperties', function (Blueprint $table) {
            $table->id();
            $table->string('interest_name')->nullable();
            $table->string('interest_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('language')->nullable();
            $table->string('interest_message')->nullable();
            $table->string('property_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interestproperties');
    }
};
