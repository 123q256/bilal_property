<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sqfoot extends Model
{
    use HasFactory;
    protected $table = 'sqfeet';

    protected $fillable = [
        'sqfoot_listing',
        'listing_id',
        'developers_id',
    ];
}
