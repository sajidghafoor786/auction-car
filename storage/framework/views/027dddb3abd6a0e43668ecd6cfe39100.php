
<?php $__env->startSection('title'); ?>
    E-SHOP Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
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
                    <form action="<?php echo e(url('sub_category/update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
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
                                    <input type="file" class="form-control shadow-none Image" name="image" id="newImage">
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
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-5 ms-3">
                <nav aria-label="breadcrumb mt-0">
                    <ol class="breadcrumb bg-transparent  mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sub_Category</li>
                    </ol>
                    <h6 class="font-weight-bolder ">Dashboard</h6>
                </nav>
            </div>
            <div class="col-6" style="width: 56%">
                <button class="btn btn-icon btn-3 btn-primary float-end me-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#sub_categoryAdd">
                    <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                    <span class="btn-inner--text">Add Sub_Category</span>
                </button>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Sub_Category table</h6>
                        </div>
                    </div>
                    
                    
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center mt-2">
                            <form action="" method="GET" class="align-items-center d-flex">
                                <div class="input-group input-group-outline ">
                                    <label class="form-label"></label>
                                    <input value="<?php echo e(Request::get('keyword')); ?>" placeholder="Type here..." type="text"
                                        class="form-control" name="keyword">
                                </div>
                                <div class="mt-3 ms-2 ">
                                    <button type="submit" class="btn btn-primary p-2">
                                        search
                                    </button>
                                </div>
                            </form>
                            <div class="mt-3 ms-2">
                                <button
                                    class="btn btn-success p-2 "onclick="window.location.href='<?php echo e(url('/sub_category')); ?>'">
                                    <i class="material-icons me-2 reset ">lock_reset</i>Reset
                                </button>
                            </div>
                        </div>
                    
                    
                    <div class="table-responsive p-0">
                        <?php if($sub_category->isNotEmpty()): ?>
                            <table class="table align-items-center mb-0 table-striped">
                                <thead>
                                    <tr class="text-center">
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
                                    <?php $__currentLoopData = $sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"><?php echo e($item->id); ?></span>
                                            </td>
                                            <td>
                                                <div class="ms-2">
                                                    <?php if($item->image !== 'No-image.jpg'): ?>
                                                        <img src="<?php echo e(asset('upload/sub_category_img/' . $item->image)); ?>"
                                                            class="avatar avatar-xl me-3 border-radius-lg"
                                                            style="width: 1000px;" alt="user1">
                                                    <?php endif; ?>
                                                </div>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold mt-4 "><?php echo e($item->name); ?></span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"><?php echo e($item->categoryName); ?></span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?php if($item->status == '1'): ?>
                                                    <span class="badge badge-sm bg-gradient-success p-2">Active</span>
                                                <?php else: ?>
                                                    <span class="badge badge-sm bg-gradient-warning p-2">In-Active</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"><?php echo e($item->slug); ?></span>
                                            </td>
                                           
                                            <td class="td-actions text-right">
                                                
                                                <button type="button" class="btn btn-success btn-icon-only editbtn"
                                                    value="<?php echo e($item->id); ?>"><span
                                                        class="btn-inner--icon text-center"><i
                                                            class="material-icons">edit</i></span>
                                                </button>
                                                
                                                <a href="<?php echo e(url('/sub_category/delete', $item->id)); ?> "
                                                    class="btn btn-danger btn-icon-only ">
                                                    <span class="btn-inner--icon text-center"><i
                                                            class="material-icons">delete</i></span>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="text-center p-5 ">
                                <span class="text-secondary text-ls font-weight-bold">Record Not Found</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer clearfix shadow-none">
                    
                    <?php echo e($sub_category->links()); ?>

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
                    <form action="<?php echo e(url('sub_category/create')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Category</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_name">
                                        <option selected disabled value="">Choose category Option </option>
                                        <?php if($category->isNotEmpty()): ?>
                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/admin/pages/sub_category.blade.php ENDPATH**/ ?>