@extends('frontend.layout.app')
@section('title')
Car Auction | Auction Detail
@endsection
@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Auction Car</a></li>
                <li class="breadcrumb-item">{{$auction->car->name}}</li>
            </ol>
        </div>
    </div>
</section>
<section class="section-7 pt-3 mb-3">
    <div class="container">
        <div class="row">
            <!-- Car Image Section -->
            <div class="col-md-5">
                <div class="bg-light">
                    <div class="carousel-item active image-zoom-wrapper" style="height: 500px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $auction->car->image) }}"
                            alt="Image"
                            class="image-zoom"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- Car Detail Section -->
            <div class="col-md-7">
                <div class="bg-light right p-3">
                    <h1>{{ $auction->car->name }}</h1>

                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-warning">Current Bid:</span>
                            <h5>{{ $auction->current_bid }} PKR</h5>

                            <span class="text-warning">Minimum Bid:</span>
                            <h5>{{ $auction->minimum_bid }} PKR</h5>

                            <span class="text-warning">Start Date:</span>
                            <h5>{{ $auction->start_date ?? 'N/A' }}</h5>

                            <span class="text-warning">End Date:</span>
                            <h5>{{ $auction->end_date ?? 'N/A' }}</h5>
                        </div>
                        <div class="col-md-6">
                            <span class="text-warning">Car Make:</span>
                            <h5>{{ $auction->car->make ?? 'Toyota' }}</h5>
                            <span class="text-warning">Car Model:</span>
                            <h5>{{ $auction->car->model ?? 'N/A' }}</h5>
                            <span class="text-warning">Car Year:</span>
                            <h5>{{ $auction->car->year ?? 'N/A' }}</h5>
                        </div>
                    </div>
                    <span class="text-warning">Description:</span>
                    <p>{{ $auction->car->description }}</p>


                    <form id="bidForm">
                        @csrf
                        <input type="hidden" name="auction_id" value="{{ $auction->id }}">
                        <div class="row align-item-center">
                            <div class="col-md-4">
                                <label class="form-label">Current Maximum Bid</label>
                                <input type="text" class="form-control" disabled value="{{ $auction->current_bid ?? '0'}}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Your Bid</label>
                                <input type="number" name="bid_amount" class="form-control" placeholder="Enter your bid amount">
                            </div>
                            <div class="col-md-4 ">
                                <button type="submit" class="btn btn-primary w-100" style="margin-top: 32px;">
                                    <i class="fas fa-gavel me-1"></i> Bid Now
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="bidMessage" class="mt-3"></div>

                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="bg-white p-3">
                    <h2>Bid History</h2>

                    @if($bids->isEmpty())
                    <p class="text-muted">No bids yet. Be the first to bid!</p>
                    @else
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Bidder</th>
                                <th>Bid Amount (PKR)</th>
                                <th>Bid Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bids as $index => $bid)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $bid->user->name ?? 'Unknown User' }}</td>
                                <td>{{ number_format($bid->bid_amount) }}</td>
                                <td>{{ $bid->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
@section('custemjs')
<script>
    $('#bidForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('add-bid') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                toastr.success(response.message);
                $('#bidMessage').addClass('d-none');
                setTimeout(() => location.reload(), 5000);
            },
            error: function(xhr) {
                const res = xhr.responseJSON;
                if (res && res.message) {
                   $('#bidMessage').removeClass('d-none');
                    $('#bidMessage').html(`<div class="alert alert-danger">${res.message}</div>`);
                }
            }
        });
    });
</script>
@endsection