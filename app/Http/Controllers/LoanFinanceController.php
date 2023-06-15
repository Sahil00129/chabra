<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Customer;
use DB;

class LoanFinanceController extends Controller
{
    public function loanfinance()
    {
        return view('pages.loan-finance');
    }

    public function storeLoanFinanceDetails(Request $request)
    {
        try {
            DB::beginTransaction();
        $validatedData = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'contact_no' => 'required',
        ]);

        $customersave['name'] = $request->name;
        $customersave['father_name'] = $request->father_name;
        $customersave['contact_no'] = $request->contact_no;
        $customersave['address'] = $request->address;
        $customersave['status'] = 1;
        $savecustomerdetails = Customer::create($customersave);

        $loansave['customer_id'] = $savecustomerdetails->id;
        $loansave['loan_amount'] = $request->loan_amount;
        $loansave['no_of_emi'] = $request->no_of_emi;
        $loansave['emi_amount'] = $request->emi_amount;
        $loansave['emi_date'] = $request->emi_date;
        $loansave['rate_of_interest'] = $request->rate_of_interest;
        $loansave['status'] = 1;

        $saveloandetails = Loan::create($loansave);
        if ($saveloandetails) {
            $response['success'] = true;
            $response['error'] = false;
            $response['success_message'] = 'Data saved successfully';
        } else {
            $response['success'] = false;
            $response['error'] = true;
            $response['error_message'] = "Can not import consignees please try again";
        }

        DB::commit();
    } catch (Exception $e) {
        $response['error'] = false;
        $response['error_message'] = $e;
        $response['success'] = false;
        $response['redirect_url'] = $url;
    }
    return response()->json($response);

    }
    public function loanList()
    {
        $loan_details = Customer::with('LoanDetail')->get();
        return view('pages.loan-list',['loan_details' => $loan_details]);
    }
}
