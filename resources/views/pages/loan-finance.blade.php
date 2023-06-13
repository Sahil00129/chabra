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
                        <form>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Customer's Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Father's Name</label>
                                    <input type="text" class="form-control" id="inputPassword4"
                                        >
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Contact No.</label>
                                    <input type="text" class="form-control" id="inputEmail4" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Loan Amount</label>
                                    <input type="text" class="form-control" id="inputPassword4"
                                        >
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Loan Emi</label>
                                    <input type="text" class="form-control" id="inputEmail4" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Emi Date</label>
                                    <input type="date" class="form-control" id="inputPassword4"
                                        >
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Rate of Interest</label>
                                    <input type="text" class="form-control" id="inputEmail4" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Received Amount</label>
                                    <input type="text" class="form-control" id="inputPassword4"
                                        >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Save</button>
                        </form>
                    </div>

                    
                </div>
            </div>
@endsection