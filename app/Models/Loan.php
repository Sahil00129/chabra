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

    public function Customer()
    {
        return $this->hasOne('App\Models\Customer','id','customer_id');
    }
    public function LoanEmi()
    {
        return $this->hasOne('App\Models\LoanEmi','loan_id','id')->whereMonth('created_at',date('m'))->whereYear('created_at', date('Y'));
    }
}
