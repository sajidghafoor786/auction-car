@extends('admin.layout.app')
@section('title')
    E-SHOP Dashboard
@endsection
@section('pageName')
    Sub_Category
@endsection
@section('body')
    <!-- Modal for update category -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel"> Update Sub_Category </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('sub_category/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <input type="hidden" id="editId" name="editId">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="editName" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" name="slug" id="editSlug" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Status</label>
                                    <select class="form-control" name="status" id="editStatus">
                                        <option disabled value="">Choose Option </option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>

                                </div>

                                <div class="col-md-12 mb-3">
                                    <div id="oldImagesContainer" class="mt-3 mb-3 d-flex flex-wrap ImagesContainer"></div>
                                    <label for="validationCustom02">Chooes New Image</label>
                                    <input type="file" class="form-control shadow-none Image" name="image"
                                        id="newImage">
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
    <!--end  Modal for update category -->
    <div class="container-fluid py-4 px-4 ">
        <div class="d-sm-flex justify-content-between">
            <div>
                <button class="btn btn-icon bg-gradient-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#sub_categoryAdd">
                     <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                  sub_category
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
                        <h5 class="mb-0">sub_category Table</h5>
                        <p class="text-sm mb-0">
                            View all the Sub_category.
                        </p>
                    </div>
                    <div class="table-responsive p-0">
                        @if ($sub_category->isNotEmpty())
                            <table class="tablemb-0 table-striped" id="datatable-search">
                                <thead>
                                    <tr class="text-center  align-items-center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category_Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Slug</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>


                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($sub_category as $item)
                                        <tr class="text-center">

                                            <td>

                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->id }}</span>
                                            </td>
                                            <td>
                                                <div class="ms-2">
                                                    @if ($item->image !== 'No-image.jpg')
                                                        <img src="{{ asset('upload/sub_category_img/' . $item->image) }}"
                                                            class="avatar avatar-xl me-3 border-radius-lg"
                                                            style="width: 1000px;" alt="user1">
                                                    @endif
                                                </div>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold mt-4 ">{{ $item->name }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->categoryName }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($item->status == '1')
                                                    <span class="badge badge-sm bg-gradient-success p-2">Active</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-warning p-2">In-Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->slug }}</span>
                                            </td>

                                            <td class="td-actions text-right">
                                                {{-- edit button  --}}
                                                <button type="button" class="btn btn-success btn-icon-only editbtn"
                                                    value="{{ $item->id }}"><span
                                                        class="btn-inner--icon text-center"><i
                                                            class="material-icons">edit</i></span>
                                                </button>
                                                {{-- delete button  --}}
                                                <a href="{{ url('/sub_category/delete', $item->id) }} "
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


    <!-- Modal for Add sub_category  -->
    <div class="modal fade" id="sub_categoryAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ms-auto" id="exampleModalLabel">Sub_Category Details Here</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('sub_category/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_name">
                                        <option selected disabled value="">Choose category Option </option>
                                        @if ($category->isNotEmpty())
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            </div>
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
                                    <label>Image</label>
                                    <div id="oldImagesContainer" class="mt-3 mb-3 d-flex flex-wrap ImagesContainer"></div>
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
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var editId = $(this).val();
                // alert("Student ID: " + editId);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/sub_category/edit/" + editId,
                    success: function(response) {
                        // console.log(response);
                        if (response.status === 200 && response.sub_category) {
                            $('#editId').val(editId);
                            $('#editName').val(response.sub_category.name);
                            $('#editSlug').val(response.sub_category.slug);
                            // Update the status dropdown in the edit modal
                            $('#editStatus').html('<option value="1" ' + (response.sub_category
                                    .status == 1 ? 'selected' : '') + '>Active</option>' +
                                '<option value="0" ' + (response.sub_category.status == 0 ?
                                    'selected' : '') + '>In-Active</option>');

                            var imagesContainer = $('#oldImagesContainer');
                            imagesContainer.empty();

                            var imageName = response.sub_category.image
                                .trim(); // Assuming images is a single image name
                            var imagePath = '/upload/sub_category_img/' + imageName;

                            // Create a card element for the single image
                            // console.log("Image Path:", imageName);
                            if (imageName.trim() !== 'No-image.jpg') {
                                var cardHtml = `
                                        <div class="card" style="width: 150px; margin-right: 10px; margin-bottom: 10px;">
                                            <img src="${imagePath}" class="card-img-top"  style="width: 100%; object-fit: contain;">
                                            <div class="card-body">
                                                <button class="btn btn-danger deleteImageBtn"  data-image="${imageName}">Delete</button>
                                            </div>
                                        </div>
                                    `;
                                imagesContainer.append(cardHtml);
                            }
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
                                url: "/sub_category/deleteimage/" + editId,
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
