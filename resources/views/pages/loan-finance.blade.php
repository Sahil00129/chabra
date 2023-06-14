@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
    <div class="container">


        <div class="row">
            <div id="flFormsGrid" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <!-- <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Forms Grid</h4>
                            </div> -->
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form id="loan_finance" method="post" action="javascript:void(0)">
                            @csrf
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Customer's Name</label>
                                    <input type="text" class="form-control" id="" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Father's Name</label>
                                    <input type="text" class="form-control" id="" name="father_name">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Address</label>
                                    <input type="text" class="form-control" id="" name="address">
                                </div>

                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Contact No.</label>
                                    <input type="number" class="form-control" id="" name="contact_no">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Loan Amount</label>
                                    <input type="number" class="form-control" id="loanAmount" name="loan_amount">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Rate of Interest</label>
                                    <input type="number" class="form-control" id="interestRate" name="rate_of_interest">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">No. of EMI</label>
                                    <input type="number" class="form-control" id="numEMIs" name="no_of_emi">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Emi Amount</label>
                                    <input type="text" class="form-control" id="emiAmount" name="emi_amount">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Emi Date</label>
                                    <input type="date" class="form-control" id="emiDate" name="emi_date">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
            <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
            <script>
            // Calculate the EMI amount based on loan amount, interest rate, and number of EMIs
            function calculateEMIAmount() {
                var loanAmount = parseFloat($('#loanAmount').val());
                var interestRate = parseFloat($('#interestRate').val());
                var numEMIs = parseInt($('#numEMIs').val());

                var emiAmount = (loanAmount * interestRate / 100) / (1 - Math.pow(1 + interestRate / 100, -numEMIs));
                emiAmount = emiAmount.toFixed(2);

                $('#emiAmount').val(emiAmount);
            }

            // Calculate the pending amount based on the loan amount and received amount
            function calculatePendingAmount() {
                var loanAmount = parseFloat($('#loanAmount').val());
                var receivedAmount = parseFloat($('#receivedAmount').val());

                var pendingAmount = loanAmount - receivedAmount;
                pendingAmount = pendingAmount.toFixed(2);

                $('#pendingAmount').val(pendingAmount);
            }

            // Event listener for loan form submission
            $('#loanForm').submit(function(e) {
                e.preventDefault();
                // Process the loan form submission
                // ...
            });

            // Event listener for loan amount change
            $('#loanAmount').on('input', function() {
                calculateEMIAmount();
                calculatePendingAmount();
            });

            // Event listener for interest rate change
            $('#interestRate').on('input', function() {
                calculateEMIAmount();
            });

            // Event listener for number of EMIs change
            $('#numEMIs').on('input', function() {
                calculateEMIAmount();
            });

            // Event listener for received amount change
            $('#receivedAmount').on('input', function() {
                calculatePendingAmount();
            });
            </script>
            @endsection