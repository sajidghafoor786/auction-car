@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(session('success'))
            <div id="success" class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div id="error" class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Cities /</span> List
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="" class="btn btn-primary float-end">Add City</a>
            </div>
        </div>
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <table width="100%" class="table table-striped table-bordered table-hover" id="city_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#city_table').DataTable({
                responsive: true,
                "order": [],
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [3]
                },
                    {
                        "bSearchable": false,
                        "aTargets": [3]
                    }
                ]
            });
        });
    </script>

    <script>
        setTimeout(function(){
            document.getElementById('success').style.display = 'none';
        }, 2000);

        setTimeout(function(){
            document.getElementById('error').style.display = 'none';
        }, 2000);
    </script>

    <script>
        $(document).on("click", ".status-toggle", function () {
            let cityId = $(this).data("id");
            let badge = $(this);

            Swal.fire({
                title: "Are you sure?",
                text: "You want to change the status!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Change it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: cityId
                        },
                        success: function (response) {
                            if (response.status == 1) {
                                badge.removeClass("bg-danger").addClass("bg-success").text("Active");
                            } else {
                                badge.removeClass("bg-success").addClass("bg-danger").text("Inactive");
                            }
                            Swal.fire("Updated!", response.message, "success");
                        },
                        error: function () {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    });
                }
            });
        });

    </script>

    <script>
         $(document).on('click', '.delete-city', function(e) {
            e.preventDefault();
            
            let cityId = $(this).data('id');
            
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: ",
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status === 1) {
                                Swal.fire("Deleted!", response.message, "success");
                                location.reload(); 
                            } else {
                                Swal.fire("Error!", response.message, "error");
                            }
                        },
                        error: function(xhr) {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    });
                }
            });
        });
    </script>
@endsection
