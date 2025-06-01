@extends('admin.layout.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> Edit
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
                    <form action="{{ route('admin.carAuction.update', $auction->id) }}" method="POST" class="row g-3 ajax-form-admin">
                        @csrf
                        <div class="col-sm-6">
                            <label class="form-label">Select Car <span class="steric">*</span></label>
                            <select name="car_id" class="form-control {{ $errors->has('car_id') ? 'is-invalid' : '' }}">
                                <option value="">-- Select Car --</option>
                                @foreach($cars as $car)
                                <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }} {{ $car->id == $auction->car_id ?'selected' : '' }}>
                                    {{ $car->name }} ({{ $car->make }} - {{ $car->model }})
                                </option>
                                @endforeach
                            </select>
                            @error('car_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Minimum Bid <span class="steric">*</span></label>
                            <input type="text" name="minimum_bid" class="form-control {{ $errors->has('minimum_bid') ? 'is-invalid' : '' }}"
                                value="{{ old('minimum_bid', $auction->minimum_bid) }}" placeholder="Enter Minimum Bid">
                            @error('minimum_bid')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Current Bid</label>
                            <input type="text" name="current_bid" class="form-control"
                                value="{{ old('current_bid', $auction->current_bid) }}" placeholder="Current Bid">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Start Date <span class="steric">*</span></label>
                            <input type="date" name="start_date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                value="{{ old('start_date', \Carbon\Carbon::parse($auction->start_date)->format('Y-m-d')) }}">
                            @error('start_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">End Date <span class="steric">*</span></label>
                            <input type="date" name="end_date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                value="{{ old('end_date', \Carbon\Carbon::parse($auction->end_date)->format('Y-m-d')) }}">
                            @error('end_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Select Status <span class="steric">*</span></label>
                            <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                <option value="">-- Select Status --</option>
                                <option value="active" {{ old('status') == "active" ? 'selected' : '' }} {{ $auction->status == "active" ? 'selected' : ''  }}> Active</option>
                                <option value="closed" {{ old('status') == "closed" ? 'selected' : '' }} {{ $auction->status == "closed" ? 'selected' : ''  }}> Closed</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update Auction</button>
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