@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> Detail
    </h4>

    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="{{ route('admin.carAuction.index') }}" class="btn btn-primary float-end">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="info-container">
                        <ul class="list-unstyled">
                            @if(!empty($auction->car))
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Car:</span>
                                    <span>{{ $auction->car->name }} ({{ $auction->car->make }} - {{ $auction->car->model }})</span>
                                </li>
                            @endif

                            <li class="mb-3">
                                <span class="fw-medium me-2">Minimum Bid:</span>
                                <span>PKR {{ number_format($auction->minimum_bid) }}</span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Current Bid:</span>
                                <span>
                                    @if($auction->current_bid)
                                        PKR {{ number_format($auction->current_bid) }}
                                    @else
                                        Not yet placed
                                    @endif
                                </span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Start Date:</span>
                                <span>{{ \Carbon\Carbon::parse($auction->start_date)->format('d M Y h:i A') }}</span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">End Date:</span>
                                <span>{{ \Carbon\Carbon::parse($auction->end_date)->format('d M Y h:i A') }}</span>
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Status:</span>
                                @if($auction->status === 'active')
                                    <span class="badge bg-label-success">Active</span>
                                @elseif($auction->status === 'closed')
                                    <span class="badge bg-label-danger">Closed</span>
                                @else
                                    <span class="badge bg-label-secondary">Unknown</span>
                                @endif
                            </li>

                            <li class="mb-3">
                                <span class="fw-medium me-2">Created At:</span>
                                <span>{{  \Carbon\Carbon::parse($auction->created_at)->format('d M Y h:i A')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection
