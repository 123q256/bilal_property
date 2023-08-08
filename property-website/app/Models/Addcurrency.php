<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addcurrency extends Model
{
    use HasFactory;
    protected $table = 'addcurrencies';

    protected $fillable = [
        'currency',
        'status',
    ];
}
