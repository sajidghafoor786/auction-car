@if ($auctions->isNotEmpty())
    @foreach ($auctions as $auction)
        <div class="col-md-3 mb-4">
            <div class="card auction-card border-0 shadow rounded-3 h-100">
                <div class="position-relative image-hover" style="height: 250px; overflow: hidden;">
                    @php $image = $auction->car->image ?? null; @endphp
                    <img src="{{ $image ? asset('storage/' . $image) : asset('images/default-car.jpg') }}"
                        alt="Car Image" class="w-100 h-100" style="object-fit: cover;">
                </div>
                <div class="card-body text-center">
                    <a href="#" class="h6 text-dark">{{ $auction->car->name }}</a>
                    <div class="d-flex auction justify-content-between">
                        <div class="mb-2">
                            <i class="fas fa-gavel me-1 text-success"></i>
                            <span class="text-dark">Min Bid</span>
                            <p class="text-dark">{{ number_format($auction->minimum_bid) }} /PKR</p>
                        </div>
                        <div class="mb-2 justify-content-start ms-2">
                            <i class="fas fa-hand-holding-usd me-1 text-danger"></i>
                            <span class="text-dark">Current</span>
                            <p class="text-dark">{{ number_format($auction->current_bid) }} /PKR</p>
                        </div>
                        <div class="mb-2 justify-content-start ms-2">
                            <i class="fas fa-calendar-alt me-1"></i>
                            <span class="text-dark">Date /Time</span>
                            <p class="text-dark">
                                {{ \Carbon\Carbon::parse($auction->start_date)->format('d M Y h:i A') }}
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('auctionDetail', $auction->id) }}" class="btn btn-primary btn mt-2">
                        <i class="fas fa-eye me-1"></i> View Details
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-12 text-center">
        <p class="text-muted">No active car auctions found.</p>
    </div>
@endif
