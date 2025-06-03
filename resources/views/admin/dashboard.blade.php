@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Admins</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalAdmins ?? 0 }}</h4>
                            </div>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="bx bx-shield-quarter bx-sm"></i>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-text">
                            <p class="card-text">Total Users</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalUsers ?? 0 }}</h4>
                            </div>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-text">
                            <p class="card-text">Total Cars</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalCars ?? 0 }}</h4>
                            </div>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="bx bx-car bx-sm"></i>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-text">
                            <p class="card-text">Total Auction Cars</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalAuctionCars ?? 0 }}</h4>
                            </div>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                            <i class="bx bx-list-ol bx-sm"></i>
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-text">
                            <p class="card-text">Today's Bids</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalBidsToday ?? 0 }}</h4>
                            </div>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="bx bx-time-five bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-text">
                            <p class="card-text">Total Bids</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2">{{ $totalBids ?? 0 }}</h4>
                            </div>
                        </div>
                         <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                               <i class="bx bx-list-ol bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('script')
    @endsection