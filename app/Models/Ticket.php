<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'customer',
        'email',
        'ref_number',
        'problem_description',
        'mobile_number',
        'ticket_status'
    ];
}
