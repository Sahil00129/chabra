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
                            <th>EMIs Amount</th>
                            <th>EMIs Date</th>
                            <th class="no-content">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loan_details as $loan)

                        <tr>
                            <td>{{$loan->Customer->name ?? "-"}}</td>
                            <td>{{$loan->emi_amount ?? "-"}}</td>
                            <?php $last_emi_date = DB::table('loan_emis')->where('loan_id', $loan->id)->orderBy('id', 'desc')->first();
                                if (empty($loan->LoanEmi)) {
                                    $current_month = date('m');
                                    if(!empty($last_emi_date)){
                                        $current_month = date('m');
                                        $emi_date = $last_emi_date->emi_date;
                                        $date_explode = explode('-', $emi_date);
                                        $emi_date = $date_explode[0].'-'. $current_month.'-'. $date_explode[2];
                                    }else{
                                        $emi_date = $loan->emi_date;
                                    }
                                    // $emi_date = $last_emi_date->emi_date;
                                    // $date_explode = explode('-', $emi_date);
                                    // $emi_date = $date_explode[0].'-'. $current_month.'-'. $date_explode[2];
                                } else {
                                    if(!empty($last_emi_date)){
                                        $current_month = date('m');
                                        $emi_date = $last_emi_date->emi_date;
                                        $date_explode = explode('-', $emi_date);
                                        $emi_date = $date_explode[0].'-'. $current_month.'-'. $date_explode[2];
                                    }else{
                                        $emi_date = $loan->emi_date;
                                    }
                                    
                                }
                                ?>
                            <td>{{$emi_date ?? "-"}}</td>
                            @if(empty($loan->LoanEmi))
                            <td><button type="button" class="btn btn-danger pending_emi"
                                    value="{{$loan->id}}">Pending</button></td>
                            @else
                            <td><button type="button" class="btn btn-success">Received</button></td>
                            @endif


                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Customer Name</th>
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
<!-- Modal -->
<!-- /////////////////////////////////////////////////////////////// -->
<div class="modal fade" id="receving_model" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h4 class="modal-title">Confirm</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" id="loan_id" name="loan_id">
                <div class="Delt-content text-center">
                    <p class="confirmtext">Are You Sure You have Received EMIs ?</p>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="btn-section w-100 P-0">
                    <a class="btn-cstm btn-danger btn btn-modal received_emis">Yes</a>
                    <a type="" class="btn btn-modal" data-dismiss="modal">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script>
$(".pending_emi").click(function() {
    var loan_id = $(this).val();
    $('#receving_model').modal('show');
    $('#loan_id').val(loan_id);
});

$(document).on('click', '.received_emis', function() {
    var loan_id = $('#loan_id').val();
    $.ajax({
        type: "GET",
        url: "emi-received",
        data: {
            loan_id: loan_id
        },
        beforeSend: function() {

        },
        success: function(data) {
            if (data.success == true) {
                alert(data.success_message);
                window.location.reload();
            } else {
                alert(data.error_message);
            }

        }
    });
});
</script>

@endsection