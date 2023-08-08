<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletionDate extends Model
{
    use HasFactory;
    protected $table = 'completion_dates';

    protected $fillable = [
        'completions',
        'status',
    ];

    
}
