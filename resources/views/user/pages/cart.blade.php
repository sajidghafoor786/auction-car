{{-- show add to cart product of user  --}}
@extends('user.layout.app')
@section('title')
    E-SHOP
@endsection
@section('bodyContent')
    @php
        $subTotal = 0;
    @endphp
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('user.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('user.shop') }}">Shop</a></li>
                    <li class="breadcrumb-item">Cart</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-9 pt-4">
        <div class="container">
            <div class="row">
                @if (Cart::count() > 0)
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table" id="cart">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($cartItems))
                                        @foreach ($cartItems as $item)
                                            <tr >
                                                <td class="text-start">
                                                    <div class="d-flex align-items-center ">
                                                        @if (!empty($item->options->productImage->image))
                                                            <img src="{{ asset('upload/products_img/' . $item->options->productImage->image) }}"
                                                                width="" height="">
                                                        @endif
                                                        <h2>{{ $item->name }}</h2>
                                                    </div>
                                                </td>
                                                <td>{{ $item->price }}/PKR</td>
                                                <td>
                                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub"
                                                                data-id = "{{ $item->rowId }}">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control form-control-sm  border-0 text-center quantity-input"
                                                            value="{{ $item->qty }}"
                                                            data-product-id="{{ $item->id }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add"
                                                                data-id = "{{ $item->rowId }}">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="SingleProductTotal" data-product-id="{{ $item->id }}">
                                                    {{ $item->price * $item->qty }}/PKR
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="deleteItem('{{ $item->rowId }}')"><i
                                                            class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card cart-summery">
                            <div class="sub-title">
                                <h2 class="bg-white">Cart Summery</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between pb-2">
                                    <div>Subtotal</div>
                                    <div>{{ Cart::subtotal() }}</div>
                                </div>
                               
                                <div class="d-flex justify-content-between summery-end">
                                    <div>Total</div>
                                    <div>{{ Cart::subtotal() }}/PKR</div>
                                </div>
                                <div class="pt-5">
                                    <a href="{{route('user.checkout-cart')}}" class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body ">
                                <h3 class="card-title d-flex justify-content-center">Your Cart is Empty!</h3>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('custemjs')
    <script>
        $(document).ready(function() {
            // Attach an event listener to the quantity input field
            $('.quantity-input').on('input', function() {
                // Get the product ID and quantity value
                var productId = $(this).data('product-id');
                var quantity = $(this).val();
                //   alert(productId);
                // Make an AJAX request to update the subtotal
                $.ajax({
                    url: '{{ route('user.update-cart') }}', // Replace with your actual route
                    type: 'POST',
                    data: {
                        productId: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === true) {
                            // console.log("sajid"); 
                            window.location.href = '{{ route('user.cart') }}';
                        }
                    }
                    // // Update the subtotal dynamically
                    // $('.SingleProductTotal[data-product-id="' + productId + '"]').text(
                    //     response.total);
                    // $('.subtotal[data-product-id="' + productId + '"]').text(response
                    //     .subtotal);
                    // // Disable plus button and show message if stock is not available
                    // if (!response.stockAvailable) {
                    //     $('.btn-plus[data-product-id="' + productId + '"]').prop('disabled',
                    //         true);
                    //     toastr.error('your requested .','Error!'); // You can replace this with a more user-friendly notification
                    // }

                    // },
                    // error: function(error) {
                    //     console.log(error);
                    // }
                });
            });
        });

        function updateCart(rowId, newQty) {
            $.ajax({
                url: '{{ route('user.update-cart') }}', // Replace with your actual route
                type: 'POST',
                data: {
                    rowId: rowId,
                    newQty: newQty,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === true) {
                        // console.log("sajid");
                        window.location.href = '{{ route('user.cart') }}';
                        // toastr.success('Cart updated successfully', 'Success!');
                    } else {
                        window.location.href = '{{ route('user.cart') }}';
                        // toastr.error('Requested Quantity not available in Stock', 'Error!');

                    }


                }

            });
        }

        function deleteItem(rowId) {
            if (confirm('Arew you Sure want to delete Item from cart')) {
                $.ajax({
                    url: '{{ route('user.delete-cart') }}', // Replace with your actual route
                    type: 'POST',
                    data: {
                        rowId: rowId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === true) {
                            // console.log("sajid");
                            window.location.href = '{{ route('user.cart') }}';
                            // toastr.success('Cart updated successfully', 'Success!');
                        } else {
                            window.location.href = '{{ route('user.cart') }}';
                            // toastr.error('Requested Quantity not available in Stock', 'Error!');

                        }


                    }

                });

            }
        }
        $('.btn-minus').on('click', function() {
            var input = $(this).closest('.quantity').find('.quantity-input');
            var currentQuantity = parseInt(input.val());
            if (currentQuantity > 1) {
                input.val(currentQuantity - 1);
                var rowId = $(this).data('id');
                var newQty = input.val();
                updateCart(rowId, newQty);

            }
        });

        $('.btn-plus').on('click', function() {
            var input = $(this).closest('.quantity').find('.quantity-input');
            var currentQuantity = parseInt(input.val());

            if (currentQuantity < 5) {
                input.val(currentQuantity + 1);
                var rowId = $(this).data('id');
                var newQty = input.val();
                updateCart(rowId, newQty);
            }
        });
    </script>
@endsection
