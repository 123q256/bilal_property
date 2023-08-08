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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('developer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('password_show')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('developer_logo')->nullable();
            $table->string('location')->nullable();
            $table->string('type_of_property')->nullable();
            $table->string('status')->default('0')->comment("0 = Visible , 1 = hidden");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
