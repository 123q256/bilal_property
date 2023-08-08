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
        Schema::create('listing_properties', function (Blueprint $table) {
            $table->id();
            $table->string('title_name')->nullable();
            $table->string('type_of_property')->nullable();
            $table->string('number_of_bedrooms')->nullable();
            $table->string('handover')->nullable();
            $table->boolean('status')->comment('hide=1,show=0')->nullable();
            $table->string('payment_plane')->nullable();
            $table->string('first_payment')->nullable();
            $table->string('second_payment')->nullable();
            $table->string('currencys')->nullable();
            $table->string('budgets')->nullable();
            $table->string('desired_size')->nullable();
            $table->string('show_desired_size')->nullable();
            $table->string('location')->nullable();
            $table->longText('highlights')->nullable();
            $table->longText('Project_details')->nullable();
            $table->longText('amenities_details')->nullable();
            $table->longText('location_details')->nullable();
            $table->longText('Interiors_and_Units')->nullable();
            $table->longText('other_incentives')->nullable();
            $table->string('about_the_developer')->nullable();
            $table->timestamps();
        }); 
     
    }  
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_properties');
    }
};
