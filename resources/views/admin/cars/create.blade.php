@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Cars /</span> Add
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
                    <form role="form" action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin">
                        @csrf

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Name <span class="steric">*</span></label>
                            <input type="text" name="name" class="form-control {{ $errors->has('make') ? 'is-invalid' : '' }}" placeholder="Enter Make" value="{{ old('name') }}">
                            @error('make')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Make <span class="steric">*</span></label>
                            <input type="text" name="make" class="form-control {{ $errors->has('make') ? 'is-invalid' : '' }}" placeholder="Enter Make" value="{{ old('make') }}">
                            @error('make')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Model <span class="steric">*</span></label>
                            <input type="text" name="model" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" placeholder="Enter Model" value="{{ old('model') }}">
                            @error('model')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Year <span class="steric">*</span></label>
                            <input type="number" name="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" placeholder="Enter Year" value="{{ old('year') }}">
                            @error('year')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-sm-12 col-md-12">
                            <label class="form-label">Description <span class="steric">*</span></label>
                            <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="4" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <label class="form-label">Car Image <span class="steric">*</span></label>
                            <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
<div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                            <label class="form-label">Status</label>
                            <div>
                                <input name="is_active" checked type="checkbox"
                                    {{ (old("is_active") == 1 ? "checked":'') }} data-toggle="toggle">
                                <input type="hidden" name="is_active" id="is_active"
                                    value="{{ (old("is_active") == 1 ? 1 : 0) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Car</button>
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
    $(document).ready(function() {
        $('input#is_active').val('1');
    });
    $('input[name="is_active"]').change(function() {
        if ($(this).is(":checked")) {
            $('input#is_active').val('1');
        } else {
            $('input#is_active').val('0');
        }
    });
</script>
@endsection