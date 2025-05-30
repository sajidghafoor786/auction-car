@extends('admin.layout.app')
@section('title')
    E-SHOP Dashboard
@endsection
@section('pageName')
    orderDetails
@endsection
@section('body')
   
    </div>
    <div class="container-fluid py-4">
        <div class="row mx-auto">
            <div class="col-lg-8 ">
                <div class="card mb-4">
                    <div class="card-header p-3 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="w-50">
                                <h6>Order Details</h6>
                                <p class="text-sm mb-0">
                                    Order no. <b>OR#{{ $order->id }}</b> from
                                    <b>{{ \Carbon\Carbon::parse($order->created_at)->format('d F, Y') }}</b>
                                </p>
                                <p class="text-sm">
                                    <strong>Shipped date</strong>: <br>
                                    <span>
                                        @if (!empty($order->shipping_date))
                                            {{ \Carbon\Carbon::parse($order->shipping_date)->format('d F, Y') }}
                                        @else
                                            N/A
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <a href="{{ route('orderList') }}" class="btn bg-gradient-dark ms-auto mb-0">Back</a>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <hr class="horizontal dark mt-0 mb-4">
                        <div class="row">
                            @if ($orderItems->isNotEmpty())
                                @foreach ($orderItems as $orderItem)
                                    <div class="col-lg-3 col-md-3 col-12 m-3">
                                        <div class="d-flex">
                                            @php
                                                $product_img = getProductImage($orderItem->product_id);
                                            @endphp
                                            <div>
                                                <img src="{{ asset('upload/products_img/' . $product_img->image) }}"
                                                    class="avatar avatar-xxl me-3" alt="product image">
                                            </div>
                                            <div>
                                                <h6 class="text-lg mb-0 mt-2">{{ $orderItem->name }}</h6>
                                                <p class="text-sm mb-0">
                                                    {{ \Carbon\Carbon::parse($orderItem->created_at)->format('d F, Y') }}
                                                </p>
                                                <p class="text-sm mb-0 ">
                                                    Price: {{ $orderItem->price }}, Qty:{{ $orderItem->qty }}
                                                </p>
                                                @if ($order->order_status == 'pending')
                                                    <span class="badge badge-sm bg-gradient-info">
                                                        pending
                                                    </span>
                                                @elseif($order->order_status == 'shipping')
                                                    <span class="badge badge-sm bg-gradient-warning">
                                                        Shipping
                                                    </span>
                                                @elseif($order->order_status == 'cancelled')
                                                    <span class="badge badge-sm bg-gradient-danger">
                                                        Cancelled
                                                    </span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-success">
                                                        Delivered
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{-- <div class="col-lg-6 col-md-6 col-12 my-auto text-end mt-4">
                                <a href="javascript:;" class="btn bg-gradient-dark btn-sm mb-0">Contact Us</a>
                                <p class="text-sm mt-2 mb-0">Do you like the product? Leave us a review <a
                                        href="javascript:;">here</a>.</p>
                            </div> --}}
                        </div>
                        <hr class="horizontal dark mt-4 mb-4">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <h6 class="mb-3">Track order</h6>
                                <div class="timeline timeline-one-side">
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-secondary text-lg">notifications</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order received</h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">
                                                {{ \Carbon\Carbon::parse($orderItem->created_at)->format('d F, Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-secondary text-lg">code</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Generate order id
                                                OR#{{ $order->id }}
                                            </h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">
                                                {{ \Carbon\Carbon::parse($order->shipping_date)->format('d F, Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-secondary text-lg">shopping_cart</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order transmited to courier
                                            </h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">
                                                @if (!empty($order->shipping_date))
                                                    {{ \Carbon\Carbon::parse($order->shipping_date)->format('d F, Y') }}
                                                @else
                                                    N/A
                                                    <p>please wait</p>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-block mb-3">
                                        <span class="timeline-step">
                                            <i class="material-icons text-success text-gradient text-lg">done</i>
                                        </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">Order delivered</h6>
                                            <p class="text-secondary font-weight-normal text-xs mt-1 mb-0">22 DEC 4:54 PM
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-12">
                                {{-- <h6 class="mb-3">Payment details</h6>
                                <div
                                    class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                    <img class="w-10 me-3 mb-0" src="../../../assets/img/logos/mastercard.png"
                                        alt="logo">
                                    <h6 class="mb-0">
                                        ****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                                    <button type="button"
                                        class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title
                                        data-bs-original-title="We do not store card details">
                                        <i class="material-icons text-sm" aria-hidden="true">priority_high</i>
                                    </button>
                                </div> --}}
                                <h6 class="mb-3 mt-4">Billing Information</h6>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">{{ $order->f_name }}</h6>
                                            <span class="mb-2 text-xs">Last Name: <span
                                                    class="text-dark font-weight-bold ms-2">{{ $order->last_name }}</span></span>
                                            <span class="mb-2 text-xs">Email Address: <span
                                                    class="text-dark ms-2 font-weight-bold"><a
                                                        class="__cf_email__">{{ $order->email }}</a></span></span>
                                            <span class="text-xs">Phone Number: <span
                                                    class="text-dark ms-2 font-weight-bold">{{ $order->phone_no }}</span></span>
                                            <span class="text-xs">Country : <span
                                                    class="text-dark ms-2 font-weight-bold">{{ $order->CountryName }}</span></span>
                                            <span class="text-xs">City : <span
                                                    class="text-dark ms-2 font-weight-bold">{{ $order->city }}</span></span>
                                            <span class="text-xs">Address : <span
                                                    class="text-dark ms-2 font-weight-bold">{{ $order->address }}</span></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-12 ms-auto">
                                <h6 class="mb-3">Order Summary</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">
                                        Total Price:
                                    </span>
                                    <span
                                        class="text-dark font-weight-bold ms-2">{{ number_format($order->subtotal, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">
                                        Delivery:
                                    </span>
                                    <span
                                        class="text-dark ms-2 font-weight-bold">{{ number_format($order->shipping, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-sm">
                                        Discount:
                                    </span>
                                    <span
                                        class="text-dark ms-2 font-weight-bold">{{ number_format($order->discount, 2) }}</span>
                                </div>
                                <hr class="horizontal dark mt-4 mb-4">
                                <div class="d-flex justify-content-between mt-4">
                                    <span class="mb-2 text-lg">
                                        Total:
                                    </span>
                                    <span
                                        class="text-dark text-lg ms-2 font-weight-bold">{{ number_format($order->subtotal, 2) }}/PKR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="card ">
                    <form action="{{ route('order.update', $order->id) }}" method="post" id="order_update_form">
                        @csrf
                        <div class="card-body pb-0">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">
                                    <h5>Order Status</h5>
                                </label>
                                <select class="form-control" name="orderStatus">
                                    <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : ' ' }}>
                                        pending</option>
                                    <option value="shipping" {{ $order->order_status == 'shipping' ? 'selected' : ' ' }}>
                                        shipping</option>
                                    <option value="delivered"
                                        {{ $order->order_status == 'delivered' ? 'selected' : ' ' }}>delivered</option>
                                    <option value="cancelled"
                                        {{ $order->order_status == 'cancelled' ? 'selected' : ' ' }}>
                                        cancelled</option>
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">
                                    <h5>Shipping_Date</h5>
                                </label>
                                <input type="text" class="form-control" value="{{ $order->shipping_date }}"
                                    name="shippe_date" id="shipping_date" required placeholder="shipping date"
                                    autocomplete="off" min="{{ now()->toIso8601String() }}">

                            </div>
                            {{-- shipped date error  --}}
                            <div>
                                <span id="shippe_date_error" class="text-danger"></span>
                            </div>

                        </div>
                        <div class="ms-3">
                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card mt-3">
                    <form action="{{ route('sendInvoce_email', $order->id) }}" method="post" id="Invoice_Send">
                        @csrf
                        <div class="card-body pb-0">
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">
                                    <h5>Send Invoice</h5>
                                </label>
                                <select class="form-control" name="userType">
                                    <option value="Customer">Customer</option>
                                    <option value="Admin">Admin</option>

                                </select>
                            </div>

                        </div>
                        <div class="ms-3">
                            <button type="submit" class="btn bg-gradient-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('jsCode')
    {{-- datetime picker  --}}
    <script>
        $(document).ready(function() {
            $('#shipping_date').datetimepicker({
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

        $("#order_update_form").submit(function(event) {
            event.preventDefault();
            // alert('sajid');
            $.ajax({
                type: "post",
                url: "{{ route('order.update', $order->id) }}", // Corrected the URL
                data: $(this).serializeArray(),
                success: function(response) {
                    if (response.status === 200) {
                        window.location.href = '{{ route('order-detail', $order->id) }}';


                    } else {
                        $.each(response.errors, function(field, errors) {
                            $('#' + field + '_error').html(errors.join('<br>'));
                        });
                    }

                },

            });
        });
        // send invoice email
        $("#Invoice_Send").submit(function(event) {
            event.preventDefault();
            // alert('sajid');
            $.ajax({
                type: "post",
                url: "{{ route('sendInvoce_email', $order->id) }}", // Corrected the URL
                data: $(this).serializeArray(),
                success: function(response) {
                    if (response.status === 200) {
                        toastr.success(response.message, 'Success!');
                        setTimeout(function() {
                            window.location.href = '{{ route('order-detail', $order->id) }}';

                        }, 5000);
                    }


                },

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
