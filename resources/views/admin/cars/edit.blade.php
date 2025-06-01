@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Cars /</span> Edit
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('admin.cars.index') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.cars.update', $car->id ) }}" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="col-sm-6">
                                <label class="form-label">Car Name <span class="steric">*</span></label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       placeholder="Enter Car Name" value="{{ $car->name ?? old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Make <span class="steric">*</span></label>
                                <input type="text" name="make" class="form-control {{ $errors->has('make') ? 'is-invalid' : '' }}"
                                       placeholder="Enter Make" value="{{ $car->make ?? old('make') }}">
                                @error('make')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Model <span class="steric">*</span></label>
                                <input type="text" name="model" class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}"
                                       placeholder="Enter Model" value="{{ $car->model ?? old('model') }}">
                                @error('model')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Year <span class="steric">*</span></label>
                                <input type="text" name="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}"
                                       placeholder="Enter Year" value="{{ $car->year ?? old('year') }}">
                                @error('year')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $car->description ?? old('description') }}</textarea>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control">
                                @if($car->image)
                                    <img src="{{asset('storage/' . $car->image) }}" width="100" class="mt-2" />
                                @endif
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Status</label>
                                <div>
                                    @if ($car->status == 0)
                                        <input name="is_active" type="checkbox" data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="0">
                                    @else
                                        <input name="is_active" type="checkbox" checked data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="1">
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" value="{{ $car->id }}">
                                <button type="submit" class="btn btn-primary">Update Car</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /FormValidation -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('input[name="is_active"]').change(function () {
            $('#is_active').val($(this).is(':checked') ? '1' : '0');
        });
    </script>
@endsection
