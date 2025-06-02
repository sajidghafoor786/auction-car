@extends('frontend.layout.app')
@section('title')
    Auction-Car
@endsection
@section('content')
    <section class="section-1">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel"
            data-bs-interval="false">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <picture>
                        <source media="(max-width: 799px)" srcset="assets/images/slider1.webp" />
                        <source media="(min-width: 800px)" srcset="assets/images/slider1.webp" />
                        <img src="assets/images/slider1.webp" alt="Auction Car Slide 1" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Live Car Auctions</h1>
                            <p class="mx-md-5 px-5">Bid on premium cars in real-time and drive home your dream ride at
                                unbeatable prices.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Browse Auctions</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <picture>
                        <source media="(max-width: 799px)" srcset="assets/images/slider2.jpg" />
                        <source media="(min-width: 800px)" srcset="assets/images/slider2.jpg" />
                        <img src="assets/images/slider2.jpg" alt="Auction Car Slide 2" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Verified Vehicles Only</h1>
                            <p class="mx-md-5 px-5">Every car is inspected and verified before listing. No surprises—only
                                trusted deals.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">View Verified Cars</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <picture>
                        <source media="(max-width: 799px)" srcset="assets/images/slider3.webp" />
                        <source media="(min-width: 800px)" srcset="assets/images/slider3.webp" />
                        <img src="assets/images/slider3.webp" alt="Auction Car Slide 3" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Winning Deals Daily</h1>
                            <p class="mx-md-5 px-5">Don't miss your chance! New auctions open daily. Be the highest bidder
                                and win!</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Start Bidding</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-gavel text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Verified Auctions</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-car text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Wide Car Range</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-clock text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Real-Time Bidding</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-headset text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Customer Support</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title mb-4">
                <h2 class="text-dark">Car Auctions</h2>
            </div>
            <div class="row pb-3" id="activeAuctions">
                @if ($activeAuctions->isNotEmpty())
                    @foreach ($activeAuctions as $auction)
                        <div class="col-md-3 mb-4">
                            <div class="card auction-card border-0 shadow rounded-3 h-100 mb-3">
                                <div class="position-relative image-hover" style="height: 250px; overflow: hidden;">
                                    @php $image = $auction->car->image ?? null; @endphp
                                    <img src="{{ $image ? asset('storage/' . $image) : asset('images/default-car.jpg') }}"
                                        alt="Car Image" class="w-100 h-100" style="object-fit: cover;">
                                </div>
                                <div class="card-body text-center">
                                    <a href="link h6 text-dark">{{ $auction->car->name }}</a>
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
                                            <i class="fas fa-calendar-alt me-1 "></i>
                                            <span class="text-dark">Date /Time </span>
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
                        <p class="text-muted">No active car auctions available.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
