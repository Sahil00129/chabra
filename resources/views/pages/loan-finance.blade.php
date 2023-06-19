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
                                    <input type="text" class="form-control" id="c_name" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Father's Name</label>
                                    <input type="text" class="form-control" id="f_name" name="father_name">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Address</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>

                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Contact No.</label>
                                    <input type="number" class="form-control" id="contact_no" name="contact_no">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Loan Amount</label>
                                    <input type="number" class="form-control" id="loanAmount" name="loan_amount">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Interest Rate (Rupee):</label>
                                    <input type="number" class="form-control" id="interestRate" name="rate_of_interest">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Number of Months</label>
                                    <input type="number" class="form-control" id="numEMIs" name="no_of_emi">
                                </div>
                            </div>
                            <div class="form-row mb-0">
                                <!-- <div class="form-group col-md-6">
                                    <label for="inputEmail4">Emi Amount</label>
                                    <input type="text" class="form-control" id="emiAmount" name="emi_amount">
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Emi Date</label>
                                    <input type="date" class="form-control" id="emiDate" name="emi_date">
                                </div>
                            </div>
                            <button type="button" onclick="calculateEMI()" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>


                </div>
            </div>
            <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
            <script>
            function calculateEMI() {
                var customer_name = $('#c_name').val();
                var father_name = $('#f_name').val();
                var address = $('#address').val();
                var contact_no = $('#contact_no').val();
                var emi_date = $('#emiDate').val();
                var principal = parseFloat(document.getElementById("loanAmount").value);
                var months = parseInt(document.getElementById("numEMIs").value);
                var interestRate = parseFloat(document.getElementById("interestRate").value);

                if(!customer_name){
                    alert('please enter customer name');
                    return false;
                }
                if(!father_name){
                    alert('please enter Father name');
                    return false;
                }
                if(!address){
                    alert('please enter Address name');
                    return false;
                }
                if(!contact_no){
                    alert('please enter Contact number');
                    return false;
                }
                if(!principal){
                    alert('please enter loan Amount');
                }
                if(!months){
                    alert('please enter no of months');
                    return false;
                }
                if(!interestRate){
                    alert('please enter Interest Rate (Rupee)');
                    return false;
                }
                
                //calculate total amount with interest
                var monthlyInterestRate = interestRate / 100;
                var monthlyInterest = principal * monthlyInterestRate;
                var totalAmount = monthlyInterest * months;

                var amountWithInterestRate = principal + totalAmount;
                var emiamount = amountWithInterestRate / months;
                
                $('#submit').html('Please Wait...');
                $("#submit").attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: "{{url('store-loan-detail')}}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    dataType: "json",
                    data: {
                        name: customer_name,
                        father_name: father_name,
                        address: address,
                        contact_no: contact_no,
                        loan_amount: principal,
                        no_of_emi: months,
                        rate_of_interest: interestRate,
                        emi_amount: emiamount,
                        emi_date: emi_date,

                    },
                    success: function(response) {
                                $('#submit').html('Submit');
                                $("#submit").attr("disabled", false);
                                if(response.success == true) {
                                    alert(response.success_message);
                                    window.location.href = "loan-list";
                                }else{
                                  alert(response.error_message);
                                }
                            }
                });

            }
            </script>

            @endsection