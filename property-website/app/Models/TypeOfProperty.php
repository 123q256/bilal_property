<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfProperty extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_type',
        'status',
    ];
}
