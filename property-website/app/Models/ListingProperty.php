<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingProperty extends Model
{
    use HasFactory;
    protected $table = 'listing_properties';
    protected $fillable = [
        'title_name',
        'type_of_property',
        'number_of_bedrooms',
        'handover',
        'status',
        'payment_plane',
        'first_payment',
        'second_payment',
        'currencys',
        'desired_size',
        'show_desired_size',
        'budgets',
        'location',
        'highlights',
        'Project_details',
        'amenities_details',
        'location_details',
        'Interiors_and_Units',
        'other_incentives',
        'about_the_developer',
    ];
} 