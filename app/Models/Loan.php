<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'loan_amount', 'rate_of_interest', 'no_of_emi', 'emi_amount','emi_date','received_amount','pending_amount', 'status', 'created_at', 'updated_at'
    ];
}
