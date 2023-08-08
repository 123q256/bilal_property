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
        Schema::create('chatboxes', function (Blueprint $table) {
            $table->id();
            $table->string('chatbox_category')->nullable();
            $table->string('chatbox_your_name')->nullable();
            $table->string('chatbox_company_name')->nullable();
            $table->string('chatbox_email')->nullable();
            $table->string('chatbox_phone_no')->nullable();
            $table->string('chatbox_budget')->nullable();
            $table->string('chatbox_investment')->nullable();
            $table->string('chatbox_aed')->nullable();
            $table->string('chatbox_apartment')->nullable();
            $table->string('chatbox_studio')->nullable();
            $table->string('chatbox_immediately')->nullable();
            $table->string('chatbox_specific_requirement')->nullable();
            $table->string('chatbox_details')->nullable();
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatboxes');
    }
};
