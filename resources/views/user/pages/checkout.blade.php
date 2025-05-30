@extends('user.layout.app')
@section('title')
    Checkout-cart
@endsection
@section('bodyContent')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                    <li class="breadcrumb-item">Checkout</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-9 pt-4">
        <div class="container">
            <form action="{{ route('user.process-checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="sub-title">
                            <h2>Shipping Address</h2>
                        </div>
                        <div class="card shadow-lg border-0">
                            <div class="card-body checkout-form">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" name="first_name" id="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                placeholder="First Name" value="{{ old('first_name') }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" name="last_name" id="last_name"
                                                class="form-control  @error('last_name') is-invalid @enderror"
                                                placeholder="Last Name" value="{{ old('last_name') }}">
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" name="email" id="email"
                                                class="form-control  @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <select name="country_id" id="country_id"
                                                class="form-control   @error('country_id') is-invalid @enderror"
                                                value="{{ old('country_id') }}">
                                                <option value="0" selected>Select A country</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <textarea name="address" id="address" cols="30" rows="3" placeholder="Address"
                                                value="{{ old('address') }}" class="form-control  @error('address') is-invalid @enderror"></textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" name="appartment" id="appartment" class="form-control "
                                                placeholder="Apartment, suite, unit, etc. (optional)">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                                class="form-control  @error('city') is-invalid @enderror"
                                                placeholder="City">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <input type="text" name="state" id="state" value="{{ old('state') }}"
                                                class="form-control  @error('state') is-invalid @enderror"
                                                placeholder="State">
                                            @error('state')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <input type="text" name="zip" id="zip"
                                                value="{{ old('zip') }}"
                                                class="form-control  @error('zip') is-invalid @enderror"
                                                placeholder="Zip">
                                            @error('zip')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="number" name="mobile" id="mobile"
                                                value="{{ old('mobile') }}"
                                                class="form-control  @error('mobile') is-invalid @enderror"
                                                placeholder="Mobile No.">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sub-title">
                            <h2>Order Summery</h3>
                        </div>
                        <div class="card cart-summery">
                            <div class="card-body">
                                @foreach (Cart::content() as $item)
                                    <div class="d-flex justify-content-between pb-2">
                                        <div class="h6">{{ $item->name }} X {{ $item->qty }}</div>
                                        <div class="h6">{{ $item->price * $item->qty }}/PKR</div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-between summery-end">
                                    <div class="h6"><strong>Subtotal</strong></div>
                                    <div class="h6"><strong>{{ Cart::subtotal() }}/PKR</strong></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="h6"><strong>Shipping</strong></div>
                                     {{-- hidden input use sent data in database  --}}
                                    <input type="hidden" name="shipping" class="shipping" value="0.00">
                                    <div class="h6"><strong id="shipping">0.00/PKR</strong></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="h6"><strong>Discount</strong></div>
                                    {{-- hidden input use sent data in database  --}}
                                    <input type="hidden" name="discount" class="discount" value="0.00">
                                    <div class="h6"><strong id="discount">0.00/PKR</strong></div>
                                </div>
                                <div class="d-flex justify-content-between mt-2 summery-end">
                                    <div class="h5"><strong>grandTotal</strong></div>
                                     {{-- hidden input use sent data in database  --}}
                                    <input type="hidden" name="grandTotal" class="grandTotal"
                                        value="{{ Cart::subtotal() }}">
                                    <div class="h5"><strong id="grandTotal">{{ Cart::subtotal() }} /PKR</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group apply-coupan mt-4">
                            <input type="text" placeholder="Coupon Code" name="coupen_code" class="form-control" id="coupen_code">
                            <button class="btn btn-dark" type="button" name="coupen_apply" id="apply_coupen">Apply
                                Coupon</button>
                        </div>
                        <div class="coupen-error">
                            <p id="error"> </p>
                        </div>
                        <div class="card payment-form ">
                            <h3 class="card-title h5 mb-3">Payment Method</h3>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="COD"
                                    id="payment_method_one" checked>
                                <label for="payment_method_one" class="form-check-label">COD</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="payment_method" value="stripe"
                                    id="payment_method_two">
                                <label for="payment_method_two" class="form-check-label">Stripe</label>
                            </div>
                            <div class="card-body p-0 mt-4 d-none" id="stripe_card_method">
                                <div class="mb-3">
                                    <label for="card_number" class="mb-2">Card Number</label>
                                    <input type="text" name="card_number" id="card_number"
                                        placeholder="Valid Card Number" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="expiry_date" class="mb-2">Expiry Date</label>
                                        <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYYY"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="expiry_date" class="mb-2">CVV Code</label>
                                        <input type="text" name="expiry_date" id="expiry_date" placeholder="123"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit"class="btn-dark btn btn-block w-100">Pay Now</button>
                                {{-- <a href="#" class="btn-dark btn btn-block w-100">Pay Now</a> --}}
                            </div>
                        </div>
                        <!-- CREDIT CARD FORM ENDS HERE -->
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('custemjs')
    <script>
        $('#payment_method_one').click(function() {
            if ($(this).is(":checked") == true) {
                $("#stripe_card_method").addClass('d-none');
            }
        });
        $('#payment_method_two').click(function() {
            if ($(this).is(":checked") == true) {
                $("#stripe_card_method").removeClass('d-none');
            }
        });
    </script>
    <script>
        //  onclick change shipping charge change  and multipe image
        $(document).ready(function() {
            // Handle change event 
            $('#country_id').change(function() {
                // var countryId = $(this).val();
                // alert("Student ID: " + editId);
                $.ajax({
                    type: "post",
                    url: "{{ route('user.checkoutShipping') }}",
                    data: {
                        CountryId: $("#country_id").val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.status === true) {
                            $('#shipping').html(response.shippingCharge + '/PKR');
                            $('.shipping').val(response.shippingCharge);
                            $('#grandTotal').html(response.grandTotal + '/PKR');
                            $('.grandTotal').val(response.grandTotal);
                           
                          
                        }
                    }

                });

            });
        });
    </script>
    <script>
        //  onclick change shipping charge change  and multipe image
        $(document).ready(function() {
            // Handle change event 
            $('#apply_coupen').click(function() {
                // var countryId = $(this).val();
                // alert("Student ID: " + countryId);
                $.ajax({
                    type: "get",
                    url: "/discount-coupen-apply",
                    data: {
                        code: $("#coupen_code").val(),
                        CountryId: $("#country_id").val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response.status === true) {
                            $('#shipping').html(response.shippingCharge + '/PKR');
                            $('.shipping').val(response.shippingCharge);
                            $('#grandTotal').html(response.grandTotal + '/PKR');
                            $('.grandTotal').val(response.grandTotal);
                            $('#discount').html(response.discount + '/PKR');
                            $('.discount').val(response.discount);
                            $('#error').html("<span class='text-success'>" +response.message+ "</span>");
                        }
                        else{
                            $('#error').html("<span class='text-danger'>" +response.message+ "</span>");
                            
                        }

                    }

                });

            });
        });
    </script>
    <script></script>
@endsection
