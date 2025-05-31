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
            <span class="text-muted fw-light">Users /</span> List
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('admin.createUser') }}" class="btn btn-primary float-end">Add User</a>
            </div>
        </div>
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <table width="100%" class="table table-striped table-bordered table-hover" id="users_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Role Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    @foreach($users as $user)
                        <tr class="odd gradeX">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone ?? 'N/A'}} </td>
                            <td>
                             <span class="badge bg-info me-1">Admin </span>
                            </td>
                            <td class="text-center">
                                @if($user->status == 1)
                                    <a href="javascript:void(0);" onclick="changeStatus('0', {{ $user->id }});"
                                    class="badge bg-success me-1"> Active </a>
                                @else
                                    <a href="javascript:void(0);" onclick="changeStatus('1', {{ $user->id }});"
                                    class="badge bg-danger me-1"> Inactive </a>
                                @endif
                            </td>
                            <td>
                                <a class="dropdown-item" href="{{ route('admin.editUser', $user->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>

                                <a class="dropdown-item" href="{{ route('admin.viewUser', $user->id) }}">
                                    <i class="bx bx-show me-1"></i> View</a>

                                <a class="dropdown-item" href="javascript:void(0);" onclick="deleteUser({{$user->id}});">
                                    <i class="bx bx-trash me-1"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#users_table').DataTable({
                responsive: true,
                "order": [],
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [5]
                },
                    {
                        "bSearchable": false,
                        "aTargets": [5]
                    }
                ]
            });
        });
    </script>

    <script>
        function deleteUser(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this user?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.deleteUser') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            'user_id': userId
                        },
                        success: function (response) {
                            notifyBlackToast(response.message)
                            location.reload();
                        }
                    });

                }
            })

        }

        function changeStatus(status, userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change user status?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "{{ route('admin.changeStatus') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            'status': status,
                            'user_id': userId
                        },
                        success: function (response) {
                            notifyBlackToast(response.message)
                            location.reload();

                        }
                    });

                }
            })

        }
    </script>

    <script>
        setTimeout(function(){
            document.getElementById('success').style.display = 'none';
        }, 2000);

        setTimeout(function(){
            document.getElementById('error').style.display = 'none';
        }, 2000);
    </script>

@endsection

