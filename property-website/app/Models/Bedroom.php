<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedroom extends Model
{
    use HasFactory;
    protected $table = 'bedrooms';
    protected $fillable = [
        'number_of_bed',
        'status',
    ];
}
