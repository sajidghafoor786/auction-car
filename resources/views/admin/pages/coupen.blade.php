@extends('admin.layout.app')
@section('title')
    E-SHOP Dashboard
@endsection
@section('pageName')
    Discount_Coupen
@endsection
@section('body')
    <!-- Modal for update coupen -->
    <div class="modal fade" id="editCoupen">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Discount_Coupen</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal">X</button>
                </div>
                <form action="{{ url('coupen/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editId" name="id">
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-frame shadow-lg">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Coupen Name</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        required placeholder="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Coupen Code</label>
                                                    <input type="text" class="form-control" name="code" id="code"
                                                        required placeholder="Coupen Code">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Max_Uses</label>
                                                    <input type="text" class="form-control" name="max_uses"
                                                        placeholder="max_uses" id="max_uses" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Max_Uses_user</label>
                                                    <input type="text" class="form-control" name="max_uses_user"
                                                        placeholder="Max_Uses_user" id="max_uses_user" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Discount_Amount</label>
                                                    <input type="text" class="form-control" name="d_amount"
                                                        placeholder="Discount_Amount" id="d_amount" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Min_Discount_Amount</label>
                                                    <input type="text" class="form-control" name="m_d_amount"
                                                        placeholder="Min_Discount_Amount" id="m_d_amount" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label for="exampleFormControlSelect1"
                                                        class="ms-0">Discount_Type</label>
                                                    <select class="form-control" name="d_type" id="d_type">
                                                        {{-- <option disabled value="">Choose Option  </option> --}}
                                                        <option value="PERCENT" selected>percent</option>
                                                        <option value="FIXED">Fixed</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label for="exampleFormControlSelect1" class="ms-0">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        {{-- <option disabled value="">Choose Option </option> --}}
                                                        <option value="Active">Active</option>
                                                        <option value="In-Active">In-Active</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Started_at</label>
                                                    <input type="text" class="form-control" name="started_at"
                                                        placeholder="Started_at" id="started_at" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Expired_at</label>
                                                    <input type="text" class="form-control" name="expired_at"
                                                        placeholder="Expired_at" id="expired_at" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Coupen_Description</label>
                                                    <textarea class="form-control" rows="5" name="description" id="description"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn bg-gradient-primary btn-lg btn-rounded w-25 mt-5 mb-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end  Modal for update category -->
    </div>
      <div class="container-fluid py-4 px-4 ">
        <div class="d-sm-flex justify-content-between">
            <div>
                <button class="btn btn-icon bg-gradient-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#addCoupen">
                     <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                  Discount_Coupen
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
                        <h5 class="mb-0">Discount_Coupen Table</h5>
                        <p class="text-sm mb-0">
                            View all the Discount_Coupen.
                        </p>
                    </div>
                    <div class="table-responsive p-0">
                        @if ($coupen->isNotEmpty())
                            <table class="table align-items-center mb-0 table-striped" id="datatable-search">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Coupen_Code</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Coupen_Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Discount</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Started_at</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Expired_at</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($coupen as $item)
                                        <tr class="text-center">
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->id }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->code }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->coupen_name }}</span>
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                @if ($item->type == 'PERCENT')
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->discount_amount }}
                                                        <span class="text-danger">%</span> </span>
                                                @else
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->discount_amount }} /<span class="text-danger">PKR</span></span>
                                                @endif
                                            </td>
                                              <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->start_at }}</span>
                                            </td>
                                              <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->end_at }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($item->status == 'Active')
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
                                                <a href="{{ url('/coupen/delete', $item->id) }} "
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


    <!-- Modal for add coupen -->
    <div class="modal fade" id="addCoupen">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title m-auto">Discount_Coupen Details Here</h4>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal">X</button>
                </div>
                <!-- Modal body -->
                <form action="{{ url('coupen/create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-frame shadow-lg">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Coupen Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="copen_name" required placeholder="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Coupen Code</label>
                                                    <input type="text" class="form-control" name="code"
                                                        id="code" required placeholder="Coupen Code">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Max_Uses</label>
                                                    <input type="text" class="form-control" name="max_uses"
                                                        placeholder="max_uses" id="max_uses" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Max_Uses_user</label>
                                                    <input type="text" class="form-control" name="max_uses_user"
                                                        placeholder="Max_Uses_user" id="max_uses_user" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Discount_Amount</label>
                                                    <input type="text" class="form-control" name="d_amount"
                                                        placeholder="Discount_Amount" id="d_amount" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Min_Discount_Amount</label>
                                                    <input type="text" class="form-control" name="m_d_amount"
                                                        placeholder="Min_Discount_Amount" id="m_d_amount" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label for="exampleFormControlSelect1"
                                                        class="ms-0">Discount_Type</label>
                                                    <select class="form-control" name="d_type" id="d_type">
                                                        {{-- <option disabled value="">Choose Option  </option> --}}
                                                        <option value="percent" selected>percent</option>
                                                        <option value="fixed">Fixed</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label for="exampleFormControlSelect1" class="ms-0">Status</label>
                                                    <select class="form-control" name="status" id="editStatus">
                                                        <option disabled value="">Choose Option </option>
                                                        <option value="Active">Active</option>
                                                        <option value="In-Active">In-Active</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Started_at</label>
                                                    <input type="text" class="form-control" name="started_at"
                                                        placeholder="Started_at" id="started_at" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Expired_at</label>
                                                    <input type="text" class="form-control" name="expired_at"
                                                        placeholder="Expired_at" id="expired_at" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Coupen_Description</label>
                                                    <textarea class="form-control" rows="5" name="description"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn bg-gradient-primary btn-lg btn-rounded w-25 mt-5 mb-3">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--end  Modal for add product -->
@endsection
@section('jsCode')
    {{-- datetime picker  --}}
    <script>
        $(document).ready(function() {
            $('#started_at').datetimepicker({
                // options here
                format: 'Y-m-d H:i:s',
            });
        });
        $(document).ready(function() {
            $('#expired_at').datetimepicker({
                // options here
                format: 'Y-m-d H:i:s',
            });
        });
    </script>

    <script>
        // edit coupen with modal and js code
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var editId = $(this).val();
                // alert("Student ID: " + editId);
                $('#editCoupen').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/coupen/edit/" + editId,
                    success: function(response) {
                        // console.log(response);
                        if (response.status === 200 && response.coupen) {
                            $('#editId').val(editId);
                            $('#name').val(response.coupen.coupen_name);
                            $('#code').val(response.coupen.code);
                            $('#description').val(response.coupen.description);
                            $('#status').val(response.coupen.status);
                            $('#max_uses').val(response.coupen.max_uses);
                            $('#max_uses_user').val(response.coupen.max_uses_user);
                            $('#d_amount').val(response.coupen.discount_amount);
                            $('#m_d_amount').val(response.coupen.min_amount);
                            $('#d_type').val(response.coupen.type);
                            $('#started_at').val(response.coupen.start_at);
                            $('#expired_at').val(response.coupen.end_at);

                        }

                    }

                });


            });

            // triggle methed for open modal show sub category  
            $('#editProduct').on('shown.bs.modal', function() {
                $(".Category").trigger('change');
            });
            //   onchange category base sub_category change when product update
            $(".Category").change(function() {
                var category_id = $(this).val();
                // alert("category ID: " + category_id);
                $.ajax({
                    type: "GET",
                    url: "/product_sub_category",
                    data: {
                        category_id: category_id
                    },
                    success: function(response) {
                        if (response.status === 200 && response.subcategory) {
                            var subcategories = response.subcategory;
                            var subCategorySelect = $("#sub_category_edit");
                            // Save the first option
                            var firstOption = subCategorySelect.find(
                                'option:first');
                            // Clear existing options (excluding the first option)
                            subCategorySelect.empty().append(firstOption);
                            // Append new options based on the subcategories
                            $.each(subcategories, function(index, subcategory) {
                                subCategorySelect.append(
                                    $("<option></option>")
                                    .attr("value", subcategory.id)
                                    .text(subcategory.name)
                                );
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            //   onchange category base sub_category change add product
            $("#category").change(function() {
                var category_id = $(this).val();
                //  alert("Student ID: " + category_id);
                $.ajax({
                    type: "GET",
                    url: "/product_sub_category",
                    data: {
                        category_id: category_id
                    },

                    success: function(response) {
                        // console.log(response);
                        if (response.status === 200 && response.subcategory) {
                            var subcategories = response.subcategory;
                            var subCategorySelect = $("#sub_category");
                            // Save the first option
                            var firstOption = subCategorySelect.find(
                                'option:first');
                            // Clear existing options (excluding the first option)
                            subCategorySelect.empty().append(firstOption);
                            // Append new options based on the subcategories
                            $.each(subcategories, function(index, subcategory) {
                                subCategorySelect.append(
                                    $("<option></option>")
                                    .attr("value", subcategory.id)
                                    .text(subcategory.name)
                                );
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });





        });
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}', 'Error');
                @endforeach
            });
        </script>
    @endif
@endsection
