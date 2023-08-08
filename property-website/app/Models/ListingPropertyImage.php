<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingPropertyImage extends Model
{
    use HasFactory;
    protected $table = 'listing_property_images';
    protected $fillable = [
        'list_pro_image',
        'list_property_id',
    ];
}
