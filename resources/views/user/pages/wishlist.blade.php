@extends('user.layout.app')
@section('title')
    WishList
@endsection
@section('bodyContent')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                    <li class="breadcrumb-item">Settings</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-11 ">
        <div class="container  mt-5">
            <div class="row">
                <div class="col-md-3">
                    @include('user.account.common.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Orders</h2>
                        </div>
                        <div class="card-body p-4">
                            @if ($wishlist->isNotEmpty())
                                @foreach ($wishlist as $item)
                                    @php
                                        $product = ProductDetails($item->product_id);
                                        $product_img = getProductImage($item->product_id);
                                    @endphp
                                    <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                        <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                            <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#"
                                                style="width: 10rem;">
                                                <img src="{{ asset('upload/products_img/' . $product_img->image) }}"
                                                    alt="Product">
                                            </a>
                                            <div class="pt-2">
                                                <h3 class="product-title fs-base mb-2">
                                                    <a href="shop-single-v1.html">{{ $product->title }}</a>
                                                </h3>
                                                <div class="fs-lg text-accent pt-2">{{ $product->price }}/PKR</div>
                                            </div>
                                        </div>
                                        <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="deleteItem('{{ $item->id }}')">
                                                <i class="fas fa-trash-alt me-2"></i>Remove
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="pt-2">
                                    <h3 class="product-title fs-base mb-2 text-center"><a href="#">Not Any product in
                                            wishlist</a></h3>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custemjs')
    <script>
        function deleteItem(id) {
            if (confirm('Arew you Sure want to delete Item from Wishlist')) {
                $.ajax({
                    // alert('sajid');
                    url: '{{ route('user.delete-wislist') }}', // Replace with your actual route
                    type: 'POST',
                    data: {
                        Id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === true) {
                            // Delay the redirection by 5 seconds
                            toastr.error(response.message, 'Error!');
                            setTimeout(function() {
                                window.location.href = "{{ route('user.wishlist') }}";
                            }, 5000);
                        } else {
                            toastr.error('something went Wrong', 'Error!');


                        }


                    }

                });

            }
        }
    </script>
@endsection
