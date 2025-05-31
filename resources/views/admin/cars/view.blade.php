@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Cars /</span> Detail
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('admin.cars.index') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                @if(!empty($car->name))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Name:</span>
                                        <span>{{ $car->name }}</span>
                                    </li>
                                @endif

                                @if(!empty($car->make))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Make:</span>
                                        <span>{{ $car->make }}</span>
                                    </li>
                                @endif

                                @if(!empty($car->model))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Model:</span>
                                        <span>{{ $car->model }}</span>
                                    </li>
                                @endif

                                @if(!empty($car->year))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Year:</span>
                                        <span>{{ $car->year }}</span>
                                    </li>
                                @endif

                                @if(!empty($car->description))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Description:</span>
                                        <span>{{ $car->description }}</span>
                                    </li>
                                @endif

                                @if(!empty($car->image))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Image:</span><br>
                                        <img src="{{ asset('uploads/cars/' . $car->image) }}" alt="Car Image" style="max-width: 200px; height: auto;">
                                    </li>
                                @endif

                                <li class="mb-3">
                                    <span class="fw-medium me-2">Status:</span>
                                    @if($car->status == 1)
                                        <span class="badge bg-label-success">Active</span>
                                    @else
                                        <span class="badge bg-label-danger">Inactive</span>
                                    @endif
                                </li>

                                <li class="mb-3">
                                    <span class="fw-medium me-2">Created At:</span>
                                    <span>{{ $car->created_at }}</span>
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
