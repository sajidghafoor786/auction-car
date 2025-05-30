
<?php $__env->startSection('title'); ?>
    E-SHOP Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <!-- Modal for update category -->
    <div class="modal fade" id="editProduct">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</h4>
                    <button type="button" class="btn-close text-dark bg-danger" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form action="<?php echo e(url('products/update')); ?>" id="productFormUpdate" class="productForm" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-frame shadow-lg">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <input type="text" id="editId" name="id">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" id="editTitle"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Slug</label>
                                                    <input type="text" class="form-control" name="slug" id="editSlug"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Description</label>
                                                    <textarea class="form-control" rows="5" name="description" id="editDes"
                                                        placeholder="Say a few words about who you are or what you're working on." spellcheck="true"></textarea>
                                                </div>
                                            </div>
                                             <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Short_Description</label>
                                                    <textarea class="form-control" rows="5" name="short_description" id="short_description"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Shipping & Returns</label>
                                                    <textarea class="form-control" rows="5" name="shipping_returns" id="shipping_returns"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-frame shadow-lg mt-3">
                                    <div class="card-body">
                                        <h5>Pricing</h5>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>price</label>
                                                    <input type="number" class="form-control" name="price" id="editPrice"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Compare Price</label>
                                                    <input type="number" class="form-control" name="com_price"
                                                        id="editCom_Price" required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame shadow-lg mt-3">
                                    <div class="card-body">
                                        <h5>Inventory</h5>
                                        <div class="form-row">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>SKU (Stock keeping Unit)</label>
                                                        <input type="text" class="form-control" name="sku"
                                                            id="editSku" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>barcode</label>
                                                        <input type="text" class="form-control" name="b_code"
                                                            id="editBarcode" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Quantity</label>
                                                    <input type="number" class="form-control" name="qty" id="editQty"
                                                        required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <div class="col-md-12 mb-3 d-block">
                                            <label for="validationCustom02">
                                                <h5>Product Image</h5>
                                            </label>
                                            <div id="oldImagesContainer" class="mt-3 mb-3 d-flex flex-wrap ImagesContainer"
                                                style="overflow: hidden;">
                                            </div>
                                            <input type="file" class="form-control shadow-none Image" name="images[]"
                                                multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-frame">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                <h5>Product Status</h5>
                                            </label>
                                            <select class="form-control" name="p_status" id="editStatus">
                                                
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <h5>Product Category</h5>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">category</label>
                                            <select class="form-control Category" name="category" id="editCategory">
                                            </select>


                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                sub_category
                                            </label>
                                            <select class="form-control" name="sub_category" id="sub_category_edit">
                                                <option selected>Select a Sub Category</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                <h5>Product Brands</h5>
                                            </label>
                                            <select class="form-control" name="brand" id="editBrand">


                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                <h5>Featured Product</h5>
                                            </label>
                                            <select class="form-control" name="f_product" id="f_Product">


                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="btn bg-gradient-primary btn-lg btn-rounded w-25 mt-5 mb-3">UPDATE</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--end  Modal for update category -->
    </div>
    <div class="container-fluid py-4 ">
        <div class="row">
            <div class="col-5 ms-3">
                <nav aria-label="breadcrumb mt-0">
                    <ol class="breadcrumb bg-transparent  mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">products</li>
                    </ol>
                    <h6 class="font-weight-bolder ">Dashboard</h6>
                </nav>
            </div>
            <div class="col-6" style="width: 56%">
                <button class="btn btn-icon btn-3 btn-primary float-end me-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#addProduct">
                    <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                    <span class="btn-inner--text">Add product</span>
                </button>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Product table</h6>
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
                            <button class="btn btn-success p-2 "onclick="window.location.href='<?php echo e(url('/products')); ?>'">
                                <i class="material-icons me-2 reset ">lock_reset</i>Reset
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive p-0">
                        <?php if($product->isNotEmpty()): ?>
                            <table class="table align-items-center mb-0 table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            id</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Qty</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            SKU</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <td>

                                                <span
                                                    class="text-secondary text-xs font-weight-bold mt-4 "><?php echo e($item->id); ?></span>

                                            </td>
                                            <td>
                                                <div class="ms-2">
                                                    <?php
                                                        $product_img = $item->images->first();
                                                    ?>
                                                    <?php if(!empty($product_img)): ?>
                                                        <img src="<?php echo e(asset('upload/products_img/' . $product_img->image)); ?>"class="avatar avatar-xl me-3 border-radius-lg"
                                                            style="width: 1000px;" alt="user1">
                                                    <?php endif; ?>
                                                </div>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold mt-4 "><?php echo e($item->title); ?></span>

                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"><?php echo e($item->price); ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?php echo e($item->qty); ?> /
                                                    <span class="text-danger">Left in Stock</span> </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold"><?php echo e($item->sku); ?></span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?php if($item->status == '1'): ?>
                                                    <span class="badge badge-sm bg-gradient-success p-2">Active</span>
                                                <?php else: ?>
                                                    <span class="badge badge-sm bg-gradient-warning p-2">In-Active</span>
                                                <?php endif; ?>
                                            </td>

                                            <td class="td-actions text-right">
                                                
                                                <button type="button" class="btn btn-success btn-icon-only editbtn"
                                                    value="<?php echo e($item->id); ?>"><span
                                                        class="btn-inner--icon text-center"><i
                                                            class="material-icons">edit</i></span>
                                                </button>
                                                
                                                <a href="<?php echo e(url('/products/delete', $item->id)); ?> "
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
                    
                    <?php echo e($product->links()); ?>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal for add product -->
    <div class="modal fade" id="addProduct">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Product Details Here</h4>
                    <button type="button" class="btn-close text-dark bg-danger" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <form action="<?php echo e(url('products/create')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-frame shadow-lg">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required>
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
                                                    <label class="ms-0">Description</label>
                                                    <textarea class="form-control" rows="5" name="description"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Short_Description</label>
                                                    <textarea class="form-control" rows="5" name="short_description"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Shipping & Returns</label>
                                                    <textarea class="form-control" rows="5" name="shipping_returns"
                                                        placeholder="Say a few words what you're add here on." spellcheck="true"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-frame shadow-lg mt-3">
                                    <div class="card-body">
                                        <h5>Pricing</h5>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>price</label>
                                                    <input type="number" class="form-control" name="price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Compare Price</label>
                                                    <input type="number" class="form-control" name="com_price" required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame shadow-lg mt-3">
                                    <div class="card-body">
                                        <h5>Inventory</h5>
                                        <div class="form-row">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>SKU (Stock keeping Unit)</label>
                                                        <input type="text" class="form-control" name="sku"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="input-group input-group-static mb-4">
                                                        <label>barcode</label>
                                                        <input type="text" class="form-control" name="b_code"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <label class="ms-0">Quantity</label>
                                                    <input type="number" class="form-control" name="qty" required>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <div class="col-md-12 mb-3 d-block">
                                            <label for="validationCustom02">
                                                <h5>Product Image</h5>
                                            </label>
                                            <!-- Container for image previews in cards -->
                                            <div id="" class="mt-3 mb-3 d-flex flex-wrap ImagesContainer"></div>
                                            <input type="file" class="form-control shadow-none Image" name="images[]"
                                                multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-frame">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                <h5>Product Status</h5>
                                            </label>
                                            <select class="form-control" name="p_status">
                                                <option selected>Select a status</option>
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <h5>Product Category</h5>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">category</label>
                                            <select class="form-control" name="category" id="category">
                                                <option selected>Select a category</option>
                                                <?php if($category->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                sub_category
                                            </label>
                                            <select class="form-control" name="sub_category" id="sub_category">
                                                <option>Select a Sub Category</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                <h5>Product Brands</h5>
                                            </label>
                                            <select class="form-control" name="brand" id="brand">
                                                <option>Select a brand</option>
                                                <?php if($brand->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="card card-frame mt-3 custem-shadow">
                                    <div class="card-body">
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">
                                                <h5>Featured Product</h5>
                                            </label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="f-product">
                                                <option selected>Select a featured product</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>

                                            </select>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>
    <script>
        // edit product with modal and js code
        $(document).ready(function() {
            $(document).on('click', '.editbtn', function() {
                var editId = $(this).val();
                // alert("Student ID: " + editId);
                $('#editProduct').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/products/edit/" + editId,
                    success: function(response) {
                        // console.log(response);
                        if (response.status === 200 && response.product) {
                            $('#editId').val(editId);
                            $('#editTitle').val(response.product.title);
                            $('#editSlug').val(response.product.slug);
                            $('#editDes').val(response.product.description);
                            $('#shipping_returns').val(response.product.shipping_returns);
                            $('#short_description').val(response.product.short_desc);
                            $('#editPrice').val(response.product.price);
                            $('#editCom_Price').val(response.product.compare_price);
                            $('#editSku').val(response.product.sku);
                            $('#editBarcode').val(response.product.barcode);
                            $('#editQty').val(response.product.qty);
                            // Update the brand dropdown in the edit modal
                            var brandDropdown = $('#editBrand');
                            brandDropdown.empty();
                            $.each(response.brands, function(index, brand) {
                                brandDropdown.append('<option value="' + brand.id +
                                    '"' + (response.selectedBrand && response
                                        .selectedBrand.id == brand.id ? 'selected' :
                                        '') + '>' + brand.name + '</option>');
                            });
                            // Update the category dropdown in the edit modal
                            var categoryDropdown = $('#editCategory');
                            categoryDropdown.empty();
                            $.each(response.categorys, function(index, category) {
                                categoryDropdown.append('<option value="' + category
                                    .id + '"' + (response.selectedCategory &&
                                        response
                                        .selectedCategory.id == category.id ?
                                        'selected' :
                                        '') + '>' + category.name + '</option>');
                            });

                            // Update the status dropdown in the edit modal
                            $('#editStatus').html('<option value="1" ' + (response.product
                                    .status == 1 ? 'selected' : '') + '>Active</option>' +
                                '<option value="0" ' + (response.product.status == 0 ?
                                    'selected' : '') + '>In-Active</option>');
                            // Update the feature product dropdown in the edit modal
                            $('#f_Product').html('<option value="1" ' + (response.product
                                    .is_featured == 1 ? 'selected' : '') + '>Yes</option>' +
                                '<option value="0" ' + (response.product.is_featured == 0 ?
                                    'selected' : '') + '>No</option>');
                            // Update the image display in the edit modal
                            var imagesContainer = $('#oldImagesContainer');
                            imagesContainer.empty();

                            var images = response.product.images;

                            if (images && images.length > 0) {
                                for (var i = 0; i < images.length; i++) {
                                    var imageName = images[i].image.trim();
                                    var id = images[i].id;
                                    var imagePath = '/upload/products_img/' + imageName;

                                    // Create a new card element
                                    var cardHtml = `
                                        <div class="card" style="width: 150px; margin-right: 10px; margin-bottom: 10px;">
                                            <img src="${imagePath}" class="card-img-top" alt="Product Image"  style="width: 100%; object-fit: contain;">
                                            <div class="card-body">
                                                
                                                <button class="btn btn-danger deleteImageBtn" value="${id}" data-image="${imageName}">Delete</button>
                                            </div>
                                        </div>
                                    `;

                                    imagesContainer.append(cardHtml);
                                }
                            } else {
                                console.log("No images found in the response.");
                            }


                            // Add a click event handler for the delete button
                            $(document).on('click', '.deleteImageBtn', function() {
                                // Remove the corresponding card on delete button click
                                $(this).closest('.card').remove();
                                var Id = $(this).val();
                                //  alert("Image ID: " + Id);
                                var imageNameToDelete = $(this).data('image');
                                // For now, let's just remove the card from the UI
                                $.ajax({
                                    type: "GET",
                                    url: "/products/deleteimage/" + Id,

                                });
                            });

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

        // change image when update image
        // $(document).ready(function() {
        //     // Handle change event of the new image input
        //     $('#newImage').change(function() {
        //         var input = $(this)[0];
        //         if (input.files && input.files[0]) {
        //             var reader = new FileReader();
        //             reader.onload = function(e) {
        //                 $('#oldImage').attr('src', e.target.result); // Update preview with new image
        //             };
        //             reader.readAsDataURL(input.files[0]);
        //         }
        //     });

        //     $('#saveChanges').click(function() {
        //         // ...
        //     });
        // }); 
    </script>


    <?php if($errors->any()): ?>
        <script>
            $(document).ready(function() {
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    toastr.error('<?php echo e($error); ?>', 'Error');
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-SHOP\resources\views/admin/pages/product.blade.php ENDPATH**/ ?>