<div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2023 <a target="_blank" href="https://designreset.com">Chabra</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard/dash_1.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
      
                $("#loan_finance").validate({
                    rules: {
                        customer_name: {
                            required: true,
                            maxlength: 50
                        },
                        father_name: {
                            required: true,
                            maxlength: 50,
                        },
                        contact_no: {
                            required: true,
                            maxlength: 10
                        },
                    },
                    messages: {
                        customer_name: {
                            required: "Please enter customer name",
                            maxlength: "Your name maxlength should be 50 characters long."
                        },
                        father_name: {
                            required: "Please enter father name",
                            maxlength: "The name should less than or equal to 50 characters",
                        },
                        contact_no: {
                            required: "Please enter phone number",
                            maxlength: "Your number maxlength should be 10 characters long."
                        },
                    },
                    submitHandler: function(form) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $('#submit').html('Please Wait...');
                        $("#submit").attr("disabled", true);
                        $.ajax({
                            url: "{{url('store-loan-detail')}}",
                            type: "POST",
                            data: $('#loan_finance').serialize(),
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
                })
        
    </script>
     <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>
      <script>
        // Monthly EMI Collection - Placeholder Data
        var emiData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    label: 'EMI Collection',
                    data: [5000, 7000, 6000, 8000, 9000, 7500],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }
            ]
        };
        var emiChartConfig = {
            type: 'line',
            data: emiData,
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'EMI Collection'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            }
        };
        var emiChart = new Chart(document.getElementById('emiChart'), emiChartConfig);

        // Loan Status Distribution - Placeholder Data
        var loanStatusData = {
            labels: ['Pending', 'Received'],
            datasets: [
                {
                    label: 'Loan Status Distribution',
                    data: [60, 40],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(75, 192, 192, 0.5)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 2
                }
            ]
        };
        var loanStatusChartConfig = {
            type: 'pie',
            data: loanStatusData,
            options: {
                responsive: true
            }
        };
        var loanStatusChart = new Chart(document.getElementById('loanStatusChart'), loanStatusChartConfig);

        // Top Customers by Loan Amount - Placeholder Data
        var topCustomersData = {
            labels: ['Customer 1', 'Customer 2', 'Customer 3', 'Customer 4', 'Customer 5'],
            datasets: [
                {
                    label: 'Loan Amount',
                    data: [5000, 7000, 6000, 8000, 9000],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }
            ]
        };
        var topCustomersChartConfig = {
            type: 'bar',
            data: topCustomersData,
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Customer'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Loan Amount'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            }
        };
        var topCustomersChart = new Chart(document.getElementById('topCustomersChart'), topCustomersChartConfig);

        // Delinquency Rate - Placeholder Data
        var delinquencyData = {
            labels: ['Delinquent', 'Non-Delinquent'],
            datasets: [
                {
                    label: 'Delinquency Rate',
                    data: [20, 80],
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(75, 192, 192, 0.5)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 2
                }
            ]
        };
        var delinquencyChartConfig = {
            type: 'doughnut',
            data: delinquencyData,
            options: {
                responsive: true
            }
        };
        var delinquencyChart = new Chart(document.getElementById('delinquencyChart'), delinquencyChartConfig);
    </script>

