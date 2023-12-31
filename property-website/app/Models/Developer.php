<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $fillable = [
        'developer_name',
        'email',
        'password',
        'description',
        'status',
        'password_show',
        'location',
        'type_of_property',
    ];
}  
