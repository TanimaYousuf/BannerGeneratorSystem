<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Banner Generator System</title>
    @include('backend.layouts.styles')
    <link rel="stylesheet" href="{{asset('backend/assets/templates/vendors/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
<div class="container-scroller role-list-page">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.header')
    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')
        <div class="main-panel role-list-main-panel">
            <div class="content-wrapper">
                <h3 class="role-list-title">All DSD-Banner</h3>
                <hr class="Dash-Line">
                @include('backend.layouts.messages')
                <div class="row DataTableBox">
                    <div class="row role-list-table-subHeader">
                        <div class="col-sm-5 subHeader-col-1">
                            <div class="form-inline">
                                <span>
                                    <b>DSD-Banner List</b>
                                </span>
                                <input class="form-control role-list-search mr-sm-2 " type="search" id="search" placeholder="Search..." aria-label="Search">
                            </div>
                        </div>
                        <div class="col-sm-7 subHeader-col-2">
                            
                            <a class="btn-hover" href="{{route('banners.create')}}">
                                <button class="role-list-New-role-btn">New Banner</button>
                            </a>
                            
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="table-responsive banner-table" style="margin-bottom: 20px;">
                        @include('backend.banners.banner_table')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            {{--            footer--}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
</div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->

        @include('backend.layouts.scripts')
        <script>
            $(document).ready(function() {
                dataTable();
            });
            function dataTable(){
                const tableCustom =  $('.table').DataTable({
                    "pageLength": 10,
                    "dom": 'lrtip',
                    "lengthChange": false,
                    columnDefs: [
                        { orderable: false, targets: [-1] }
                    ]
                });
                $('#search').keyup(function(){
                    tableCustom.search($(this).val()).draw() ;
                })
            }
            function deleteData(id){
                event.preventDefault();
                swal({
                        title: "Are you sure?",
                        type: "error",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "CONFIRM",
                        cancelButtonText: "CANCEL",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function() {
                        $.ajax({
                            url: $("#" + id).attr('action'),
                            method: 'POST',
                            data: $("#" + id).serializeArray(),
                            success: function () {
                                location.reload();
                            }
                        });
                    }
                );
            }
        </script>

</body>

</html>
