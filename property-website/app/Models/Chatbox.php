<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatbox extends Model
{
    use HasFactory;

    protected $table = 'chatboxes';

    protected $fillable = [
        'chatbox_category',
        'chatbox_your_name',
        'chatbox_company_name',
        'chatbox_email',
        'chatbox_phone_no',
        'chatbox_budget',
        'chatbox_investment',
        'chatbox_aed',
        'chatbox_apartment',
        'chatbox_studio',
        'chatbox_immediately',
        'chatbox_specific_requirement',
        'chatbox_details',
        'user_id',
       
    ];

}
