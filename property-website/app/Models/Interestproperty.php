<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interestproperty extends Model
{
    use HasFactory;
    protected $table = 'interestproperties';
    protected $fillable = [
        'interest_name',
        'interest_email',
        'phone',
        'language',
        'interest_message',
        'property_id',
    ];
}
