<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanFinanceController extends Controller
{
    public function loanfinance()
    {
        return view('pages.loan-finance');
    }
}
