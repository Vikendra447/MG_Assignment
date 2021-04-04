<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employees</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style type="text/css">
        #sentTable_processing {display: none !important;}
        #addEmployee {font-weight: 400;text-align: center;text-decoration: none;background-color: #337ab7;color: #fff;;
            font-size: 14px;padding: 7px 6px 7px 5px;float: right!important;margin-bottom: 15px;border-radius: 5%;
            margin-right: 15px;
        }

    </style>
</head>
<body>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="text-align:center;">List of Employees</h2>
                    <a id="addEmployee" name="addEmployee" href="{{ url('add-employee') }}">
                        Add Employee
                    </a>
                    
                </div>

                <div class="body" style="margin-bottom: 30px;padding-top: 30px;">
                    <div class="row">
                        <form id="search_form" method="POST" action="{{ url('fetch-all-employees') }}">
                            {{csrf_field()}}
                            <div class="col-sm-12" style="margin-bottom: 0;">
                                <div class="col-sm-3" style="margin-bottom: 0;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="filter_name"
                                                    class="form-control"
                                                    type="text"
                                                    name="filter_name">
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 0;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="filter_email"
                                                   class="form-control"
                                                   type="text"
                                                   name="filter_email">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 0;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="filter_mobile"
                                                   class="form-control"
                                                   type="text"
                                                   name="filter_mobile">
                                            <label class="form-label">Mobile</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 0;">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <select id="filter_status"
                                                   class="form-control"
                                                   name="filter_status">
                                                <option value=""></option>
                                                <option value="1">Enable</option>
                                                <option value="2">Disable</option>
                                            </select>
                                            <label class="form-label">Status</label>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-sm-4 pull-right" style="margin-bottom: 0;">
                                    <div class="form-group" style="text-align: right;">
                                        <div style="margin:0 auto; display:inline-block;">
                                            <button style="width:85px; margin-right:2px;" type="submit"
                                                    class="pull-left btn btn-primary">Search
                                            </button>
                                            <button type="reset" id="resetFilters" style="width:86px; margin-left:2px;"
                                                    class="pull-left btn btn-default">Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="sentTable">
                            <thead>
                            <tr>
                                <th style="width: 5%">S.No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Date of Birth</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            //datatable initialization
            var table = $('#sentTable').DataTable({
                bFilter: false,
                "order": [[6, "desc"]],
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0, 1, 2, 3, 4, 5, 6]
                }
                ],
                'iDisplayLength': 10,
                "sPaginationType": "full_numbers",
                processing: true,
                serverSide: true,
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('fetch-all-employees') }}",
                    type: "POST",
                    error: function(xhr,status,error) {
                        // showNotification('alert-danger', 'Some error occurred. Try again!', 'top', 'center', 'animated fadeInDown', 'animated fadeOutUp');
                    },
                },
                fnServerParams: function (d) {
                    d['filters'] = {

                        flags: {},
                        name: $("#filter_name").val(),
                        email: $("#filter_email").val(),
                        number: $("#filter_mobile").val(),
                        status: $("#filter_status").val(),
                    };
                }
            });

            $("#search_form").click(function () {
                $('#sentTable').DataTable().draw();
                return false;
            });
        });

        $('#resetFilters').click(function () {
            $("#filter_name").parent().removeClass('focused');
            $("#filter_email").parent().removeClass('focused');
            $("#filter_mobile").parent().removeClass('focused');
            $("#filter_status").parent().removeClass('focused');
            $('#search_form').trigger('reset');
            $('#sentTable').DataTable().draw();
        });

        function deleteEmployee(id=0){
            $.ajax({
                url: '{{ url("delete-employee") }}',
                method : 'DELETE',
                data:{
                    'id' : id,
                    '_token':"{{ csrf_token() }}",
                },
                success:function(data){
                    if(data.success == true) {
                        window.location = '{{ url("/") }}';
                    }
                }
            });
        }

        function changeStatus(id=0,status){
            $.ajax({
                url: '{{ url("change-status") }}',
                method : 'POST',
                data:{
                    'id' : id,
                    'status' : status,
                    '_token':"{{ csrf_token() }}",
                },
                success:function(data){
                    if(data.success == true) {
                        window.location = '{{ url("/") }}';
                    }
                }
            });
        }

    </script>


</body>
</html>



