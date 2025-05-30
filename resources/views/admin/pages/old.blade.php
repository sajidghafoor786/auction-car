@extends('admin.layout.app')
@section('title')
    E-SHOP Dashboard
@endsection
@section('body')
    <!-- Modal for update brandsEdit -->
    <div class="modal fade" id="shippingEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel"> Update shipping Charges </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('shipping.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editId" name="editId" >
                        <div class="form-row">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Country</label>
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option selected>Select a category</option>
                                    @if ($country->isNotEmpty())
                                        @foreach ($country as $item)
                                            <option value="{{ $item->id }}"  class="m-3">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label class="ms-0">Amount</label>
                                    <input type="number" class="form-control" value="" id="amount" name="amount" required>
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
    <!--end  Modal for update category -->
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-5 ms-3">
                <nav aria-label="breadcrumb mt-0">
                    <ol class="breadcrumb bg-transparent  mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Shippings</li>
                    </ol>
                    <h6 class="font-weight-bolder ">Dashboard</h6>
                </nav>
            </div>
            <div class="col-6" style="width: 56%">
                <button class="btn btn-icon btn-3 btn-primary float-end me-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#shippingAdd">
                    <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                    <span class="btn-inner--text">Add shipping</span>
                </button>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Shippings table</h6>
                        </div>
                    </div>

                    {{-- @if ($brands->isNotEmpty()) --}}
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center mt-2">
                        <form action="" method="GET" class="align-items-center d-flex">
                            <div class="input-group input-group-outline ">
                                <label class="form-label"></label>
                                <input value="{{ Request::get('keyword') }}" placeholder="Type here..." type="text"
                                    class="form-control" name="keyword">
                            </div>
                            <div class="mt-3 ms-2 ">
                                <button type="submit" class="btn btn-primary p-2">
                                    search
                                </button>
                            </div>
                        </form>
                        <div class="mt-3 ms-2">
                            <button class="btn btn-success p-2 "onclick="window.location.href='{{ url('/category') }}'">
                                <i class="material-icons me-2 reset ">lock_reset</i>Reset
                            </button>
                        </div>
                    </div>
                    {{-- @endif --}}
                    <div class="table-responsive p-0">
                        @if ($shipping->isNotEmpty())
                            <table class="table align-items-center mb-0 table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                           Country_Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Amount</th>
                                       
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($shipping as $item)
                                        <tr class="text-center">
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->id }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->country->name }}</span>
                                            </td>                                  
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->amount }}</span>
                                            </td>                                  
                                            <td class="td-actions text-right">
                                                {{-- edit button  --}}
                                                <button type="button" class="btn btn-success btn-icon-only shippingEdit"
                                                    value="{{ $item->id }}"><span
                                                        class="btn-inner--icon text-center"><i
                                                            class="material-icons">edit</i></span>
                                                </button>
                                                {{-- delete button  --}}
                                                <a href="{{ route('shipping.destroy', $item->id) }} "
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
                <div class="card-footer clearfix shadow-none">
                    {{-- pagination  --}}
                    {{-- {{ $brands->links() }} --}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Add brands  -->
    <div class="modal fade" id="shippingAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel">Shipping Details Here</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('shipping.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Country</label>
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option selected>Select a category</option>
                                    @if ($country->isNotEmpty())
                                        @foreach ($country as $item)
                                            <option value="{{ $item->id }}" class="m-3">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label class="ms-0">Amount</label>
                                    <input type="number" class="form-control" name="amount" required>
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
        $(document).ready(function() {
            $(document).on('click', '.shippingEdit', function() {
                var editId = $(this).val();
                // alert("Student ID: " + editId);
                $('#shippingEdit').modal('show');
                $.ajax({
                    type: "post",
                    url: "/shipping/edit/" + editId,
                    data: { _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status === 200 && response.shippings) {
                            $('#editId').val(editId);
                            $('#country_id').val(response.shippings.country_id);
                            $('#amount').val(response.shippings.amount);

                            // Update the status dropdown in the edit modal
                            $('#editStatus').html('<option value="1" ' + (response.brands
                                    .status == 1 ? 'selected' : '') + '>Active</option>' +
                                '<option value="0" ' + (response.brands.status == 0 ?
                                    'selected' : '') + '>In-Active</option>');

                       
                        } else {
                            console.log("No images found in the response.");
                        }
                        // Click event handler for the delete button
                        $(document).on('click', '.deleteImageBtn', function() {
                            var editId = $('#editId').val();
                            var imageNameToDelete = $(this).data('image');

                            // Remove the corresponding card on delete button click
                            $(this).closest('.card').remove();

                            // Delete the image via AJAX
                            $.ajax({
                                type: "DELETE",
                                url: "/brands/deleteimage/" + editId,
                                data: {
                                    imageName: imageNameToDelete
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                        .attr('content')
                                },
                                success: function(response) {
                                    // Handle success response if needed
                                    // console.log(response);
                                },

                            });
                        });
                    }

                });
            });
        });
    </script>
@endsection
