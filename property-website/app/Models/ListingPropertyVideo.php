<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingPropertyVideo extends Model
{
    use HasFactory;
    protected $table = 'listing_property_videos';
    protected $fillable = [
        'list_pro_video',
        'list_property_id',
    ];
}
