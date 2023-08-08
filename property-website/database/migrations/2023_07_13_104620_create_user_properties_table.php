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
        Schema::create('user_properties', function (Blueprint $table) {
            $table->id();
            $table->string('user_property')->nullable();
            $table->string('user_bedroom')->nullable();
            $table->string('user_currency')->nullable();
            $table->string('user_budget')->nullable();
            $table->string('user_payment_plan')->nullable();
            $table->string('user_location')->nullable();
            $table->string('user_desired_size')->nullable();
            $table->string('user_dateofbirth')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_properties');
    }
};
