@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<!--  BEGIN CONTENT AREA  -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
            <div class="layout-px-spacing">
                
                <div class="row layout-top-spacing">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Father Name</th>
                                        <th>Contact No</th>
                                        <th>Loan Amount</th>
                                        <th>Rate Interest</th>
                                        <th>No of EMIs</th>
                                        <th>EMIs Amount</th>
                                        <th>EMIs Date</th>
                                        <th>Received Amount</th>
                                        <th>Pending Amount</th>
                                        <th class="no-content">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loan_details as $loan)
                                    <tr>
                                        <td>{{$loan->name ?? "-"}}</td>
                                        <td>{{$loan->father_name ?? "-"}}</td>
                                        <td>{{$loan->contact_no ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->loan_amount ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->rate_of_interest ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->no_of_emi ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->emi_amount ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->emi_date ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->received_amount ?? "-"}}</td>
                                        <td>{{$loan->LoanDetail->pending_amount ?? "-"}}</td>
                                        <td><a
                                        href="{{ url('view-emis-list/'.$loan->id) }}"
                                        class=" btn btn-sm btn-primary ml-2">view</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Customer Name</th>
                                        <th>Father Name</th>
                                        <th>Contact No</th>
                                        <th>Loan Amount</th>
                                        <th>Rate Interest</th>
                                        <th>No of EMIs</th>
                                        <th>EMIs Amount</th>
                                        <th>EMIs Date</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        <!--  END CONTENT AREA  -->




@endsection