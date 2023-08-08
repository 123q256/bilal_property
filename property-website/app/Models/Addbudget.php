<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addbudget extends Model
{
    use HasFactory;
    protected $table = 'addbudgets';

    protected $fillable = [
        'budget',
        'currency_id',
        'status',
    ];
}
