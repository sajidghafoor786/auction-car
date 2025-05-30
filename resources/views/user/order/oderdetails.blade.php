@extends('user.layout.app')
@section('title')
    profile account
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
                        {{-- orderdetails show start here  --}}
                        @if ($myorder->isNotEmpty())
                            @foreach ($myorder as $Order)
                                <div class="card-body pb-0">
                                    <!-- Info -->
                                    <div class="card card-sm">
                                        <div class="card-body bg-light mb-3">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <!-- Heading -->
                                                    <h6 class="heading-xxxs text-muted">Order No:</h6>
                                                    <!-- Text -->
                                                    <p class="mb-lg-0 fs-sm fw-bold">
                                                        OR#{{ $Order->id }}
                                                    </p>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <!-- Heading -->
                                                    <h6 class="heading-xxxs text-muted">Shipped date:</h6>
                                                    <!-- Text -->
                                                    <p class="mb-lg-0 fs-sm fw-bold">
                                                        <time datetime="2019-10-01">
                                                            @if (!empty($Order->shipping_date))
                                                            {{ \Carbon\Carbon::parse($Order->shipping_date)->format('d F, Y') }}
                                                                
                                                            @else
                                                                N/A
                                                                <p>please wait..</p>
                                                            @endif
                                                        </time>
                                                    </p>
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <!-- Heading -->
                                                    <h6 class="heading-xxxs text-muted">Status:</h6>
                                                    @if ($Order->order_status == 'pending')
                                                        <span class="badge bg-info p-2 ">Pending</span>
                                                    @elseif($Order->order_status == 'shipping')
                                                        <span class="badge bg-warning p-2 ">Shipping</span>
                                                    @elseif($Order->order_status == 'cancelled')
                                                        <span class="badge bg-danger p-2">Cancelled</span>
                                                    @else
                                                        <span class="badge bg-success p-2 ">Delivered</span>
                                                    @endif
                                                </div>
                                                <div class="col-6 col-lg-3">
                                                    <!-- Heading -->
                                                    <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                                                    <!-- Text -->
                                                    <p class="mb-0 fs-sm fw-bold">
                                                        {{ number_format($Order->grand_total, 2) }}/PKR
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif
                        {{-- orderItem show start here  --}}
                        <div class="card-footer p-3">
                            <!-- Heading -->
                            <h6 class="mb-7 h5 mt-4">Order Items ({{ $count }})</h6>

                            <!-- Divider -->
                            <hr class="my-3">

                            <!-- List group -->
                            <ul>
                                @if ($order_detail->isNotEmpty())
                                    @foreach ($order_detail as $Orderitem)
                                        <li class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-4 col-md-3 col-xl-2">
                                                    @php
                                                        $product_img = getProductImage($Orderitem->product_id);
                                                    @endphp
                                                    <!-- Image -->
                                                    @if (!empty($product_img))
                                                        <a href="product.html"><img
                                                                src="{{ asset('upload/products_img/' . $product_img->image) }}"
                                                                alt="..." class="img-fluid"></a>
                                                    @endif
                                                </div>
                                                <div class="col">
                                                    <!-- Title -->
                                                    <p class="mb-4 fs-sm fw-bold">
                                                        <a class="text-body" href="product.html">{{ $Orderitem->name }} x
                                                            {{ $Orderitem->qty }}</a> <br>
                                                        <span class="text-muted">{{ $Orderitem->total }}/PKR</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                @endif

                            </ul>
                        </div>
                    </div>
                    @if ($myorder->isNotEmpty())
                        @foreach ($myorder as $Order)
                            <div class="card card-lg mb-5 mt-3">
                                <div class="card-body">
                                    <!-- Heading -->
                                    <h6 class="mt-0 mb-3 h5">Order Total</h6>

                                    <!-- List group -->
                                    <ul>
                                        <li class="list-group-item d-flex">
                                            <span>Subtotal</span>
                                            <span class="ms-auto">{{ number_format($Order->subtotal, 2) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <span>Discount{{ $Order->coupen_code_id !== 'null' ? '( ' . $Order->coupen_code . ')' : '' }}</span>
                                            <span class="ms-auto">{{ number_format($Order->discount, 2) }}/PKR</span>
                                        </li>
                                        <li class="list-group-item d-flex">
                                            <span>Shipping</span>
                                            <span class="ms-auto">{{ number_format($Order->shipping, 2) }}/PKR</span>
                                        </li>
                                        <li class="list-group-item d-flex fs-lg fw-bold">
                                            <span>Total</span>
                                            <span class="ms-auto">{{ number_format($Order->grand_total, 2) }}/PKR</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
