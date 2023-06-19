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
                                        <th>Emi Date</th>
                                        <th>Receving Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Emi_details as $emi)
                                    <?php

                                     $changeformat = date('d-m-Y', strtotime($emi->created_at));
                                    ?>
                                    <tr>
                                        <td>{{$emi->emi_date}}</td>
                                        <td>{{$changeformat}}</td>
                                       
                                    </tr>

                                    @endforeach
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        <!--  END CONTENT AREA  -->




@endsection