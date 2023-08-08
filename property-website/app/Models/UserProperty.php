<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProperty extends Model
{
    use HasFactory;

    protected $table = 'user_properties';
    protected $fillable = [
        'user_property',
        'user_bedroom',
        'user_currency',
        'user_budget',
        'user_payment_plan',
        'user_location',
        'user_desired_size',
        'user_dateofbirth',
        'user_id',
    ];
}
