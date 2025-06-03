@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Bid /</span> Detail
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="{{ route('admin.bid.index') }}" class="btn btn-primary float-end">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if($bid->count() > 0)
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>Bidder:</strong> {{ $bid->user->name ?? 'Unknown User' }}</li>
                        <li><strong>Car Name:</strong> {{ $bid->auction->car->name ?? 'Unknown Car' }}</li>
                        <li><strong>Bid Amount:</strong> PKR {{ number_format($bid->bid_amount) }}</li>
                        <li><strong>Bid Time:</strong> {{ $bid->created_at->format('d M Y, h:i A') }}</li>
                        <li><strong>Auction start Date:</strong> {{  \Carbon\Carbon::parse($bid->auction->start_date)->format('d M Y h:i A')}}</li>
                        <li><strong>Auction End Date:</strong> {{  \Carbon\Carbon::parse($bid->auction->end_date)->format('d M Y h:i A')}}</li>
                        <li><strong>Auction Status:</strong>
                            @if($bid->auction->end_date < now())
                                <span class="badge bg-danger">Ended</span>
                                @else
                                <span class="badge bg-success">Running</span>
                                @endif
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <p class="mt-4 text-muted">No bidding history found for this user.</p>
            @endif

        </div>
    </div>

</div>
@endsection
@section('script')

@endsection