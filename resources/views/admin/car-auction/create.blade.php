@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> Add
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
                    <form role="form" action="{{ route('admin.carAuction.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin">
                        @csrf
                        <div class="col-sm-6">
                            <label class="form-label">Select Car <span class="steric">*</span></label>
                            <select name="car_id" class="form-control {{ $errors->has('car_id') ? 'is-invalid' : '' }}">
                                <option value="">-- Select Car --</option>
                                @foreach($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                                    {{ $car->name }} ({{ $car->make }} - {{ $car->model }})
                                </option>
                                @endforeach
                            </select>
                            @error('car_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Minimum Bid (PKR) <span class="steric">*</span></label>
                            <input type="number" name="minimum_bid" class="form-control {{ $errors->has('minimum_bid') ? 'is-invalid' : '' }}" placeholder="Enter Starting Price" value="{{ old('minimum_bid') }}">
                            @error('minimum_bid')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Current Bid (PKR) <span class="steric"></span></label>
                            <input type="number" name="current_bid" class="form-control {{ $errors->has('current_bid') ? 'is-invalid' : '' }}" placeholder="Enter Starting Price" value="{{ old('current_bid') }}">
                            @error('current_bid')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Start Date <span class="steric">*</span></label>
                            <input type="datetime-local" name="start_date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" value="{{ old('start_date') }}">
                            @error('start_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">End Date <span class="steric">*</span></label>
                            <input type="datetime-local" name="end_date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" value="{{ old('end_date') }}">
                            @error('end_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-sm-6">
                            <label class="form-label">Select Status <span class="steric">*</span></label>
                            <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                <option value="">-- Select Status --</option>
                                <option value="active" {{ old('status') == "active" ? 'selected' : '' }}> Active</option>
                                <option value="closed" {{ old('status') == "closed" ? 'selected' : '' }}> Closed</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Auction</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
  
</script>
@endsection