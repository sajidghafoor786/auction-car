@extends('admin.layout.app')
@section('title')
    E-SHOP Dashboard
@endsection
@section('pageName')
    All_User
@endsection
@section('body')
    <!-- Modal for update user -->
    <div class="modal fade" id="getUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel"> Update User </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('user/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <input type="hidden" id="editId" name="id">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="Editname" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" id="Editemail" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">UserType</label>
                                    <select class="form-control" name="usertype" id="Editusertype">
                                        {{-- <option disabled value="">Choose Option </option> --}}
                                        <option value="1">Admin</option>
                                        <option value="0">Customer</option>
                                    </select>

                                </div>
                               
                            </div>
                           
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary btn-lg btn-rounded w-50 mt-2 mb-3">Upadate</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--end  Modal for update brands -->
    <div class="container-fluid py-4 px-4 ">
        <div class="d-sm-flex justify-content-between">
            <div>
                <button class="btn btn-icon bg-gradient-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#AddUser">
                    <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                    User
                </button>
            </div>
            <div class="d-flex">
                <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
                    <i class="material-icons text-xs position-relative">archive</i>
                    Export CSV
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Users Table</h5>
                        <p class="text-sm mb-0">
                            View all the Users.
                        </p>
                    </div>
                    <div class="table-responsive p-0">
                        @if ($user->isNotEmpty())
                            <table class="table align-items-center mb-0 table-striped" id="datatable-search">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            usertype</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($user as $item)
                                        <tr class="text-center">
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->id }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->name }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->email }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($item->usertype == '1')
                                                    <span class="badge badge-sm bg-gradient-success p-2">Admin</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-warning p-2">Customer</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($item->status == '1')
                                                    <span class="badge badge-sm bg-gradient-success p-2">Active</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-warning p-2">In-Active</span>
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">
                                                {{-- edit button  --}}
                                                <button type="button" class="btn btn-success btn-icon-only editbtn"
                                                    value="{{ $item->id }}"><span
                                                        class="btn-inner--icon text-center"><i
                                                            class="material-icons">edit</i></span>
                                                </button>
                                                {{-- delete button  --}}
                                                <a href="{{ url('/user/delete', $item->id) }} "
                                                    class="btn btn-danger btn-icon-only ">
                                                    <span class="btn-inner--icon text-center"><i
                                                            class="material-icons">delete</i></span>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center p-5 ">
                                <span class="text-secondary text-ls font-weight-bold">Record Not Found</span>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal for Add brands  -->
    <div class="modal fade" id="AddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel">User Details Here</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('brands/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label class="ms-0">Slug</label>
                                    <input type="text" class="form-control" name="slug" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Status</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                                        <option selected disabled value="">Choose Option </option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom02">Image</label>
                                    <div id="" class="d-flex flex-wrap ImagesContainer"></div>
                                    <input type="file" class="form-control shadow-none Image" name="image">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="btn bg-gradient-primary btn-lg btn-rounded w-50 mt-2 mb-3">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('jsCode')
 <script>
        // edit coupen with modal and js code
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var editId = $(this).val();
                // alert("Student ID: " + editId);
                $('#getUser').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/user/edit/" + editId,
                    success: function(response) {
                        // console.log(response);
                        if (response.status === 200 && response.user) {
                            $('#editId').val(response.user.id);
                            $('#Editname').val(response.user.name);
                            $('#Editemail').val(response.user.email);
                            $('#Editusertype').val(response.user.usertype);
                        }

                    }

                });


            });
        });
    </script>
@endsection
