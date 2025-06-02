@extends('frontend.layout.app')
@section('title')
    profile account
@endsection
@section('content')
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                    <li class="breadcrumb-item">Biding History</li>
                </ol>
            </div>
        </div>
    </section>

   <section class="section-11">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.account.common.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">My Auction Bids</h2>
                    </div>

                    {{-- Bid details start here --}}
                    @if ($bids->isNotEmpty())
                        @foreach ($bids as $bid)
                            <div class="card-body pb-0">
                                <!-- Info -->
                                <div class="card card-sm">
                                    <div class="card-body bg-light mb-3">
                                        <div class="row">
                                            <div class="col-6 col-lg-2">
                                                <h6 class="heading-xxxs text-muted mb-1">Car Image:</h6>
                                               @if (!empty($bid->auction->car->image))
                                                    <img src="{{ asset('storage/' . $bid->auction->car->image) }}" alt="Car Image" class="img-fluid rounded" width="100">
                                                @endif
                                               
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <h6 class="heading-xxxs text-muted">Car:</h6>
                                                <p class="mb-lg-0 fs-sm fw-bold">
                                                    {{ $bid->auction->car->name ?? 'N/A' }}
                                                </p>
                                               
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <h6 class="heading-xxxs text-muted">Bid Amount:</h6>
                                                <p class="mb-lg-0 fs-sm fw-bold">
                                                    {{ number_format($bid->bid_amount, 2) }}/PKR
                                                </p>
                                            </div>
                                            <div class="col-6 col-lg-2">
                                                <h6 class="heading-xxxs text-muted">End Date:</h6>
                                                <p class="mb-lg-0 fs-sm fw-bold">
                                                    {{ \Carbon\Carbon::parse($bid->auction->end_date)->format('d F, Y') }}
                                                </p>
                                            </div>
                                            <div class="col-6 col-lg-2">
                                                <h6 class="heading-xxxs text-muted">Status:</h6>
                                                @if ($bid->auction->end_date < now())
                                                    @if (isset($endedAuctions[$bid->auction_id]) && $endedAuctions[$bid->auction_id] == $bid->bid_amount)
                                                        <span class="badge bg-success p-2">Won</span>
                                                    @else
                                                        <span class="badge bg-danger p-2">Lost</span>
                                                    @endif
                                                @else
                                                    <span class="badge bg-warning text-dark p-2">Running</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card-body">
                            <p class="text-center mb-0">You haven’t placed any bids yet.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
