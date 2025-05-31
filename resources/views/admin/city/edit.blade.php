@extends('layout.admin')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">City /</span> Edit
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('admin.cities.index') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.cities.update', $city->id) }}" class="ajax-form-admin row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')

                            <div class="col-sm-6 col-md-6">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control"
                                       placeholder="Enter City Name" value="{{ $city->name ?? old('name') }}">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label class="form-label">Country <span class="steric">*</span></label>
                                <select name="country_id" id="country_id" class="form-control select2">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" 
                                            {{ $city->country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Status</label>
                                <div>
                                    @if ($city->status == 0)
                                        <input name="is_active" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="{{$city->status}}">
                                    @else
                                        <input name="is_active" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="{{$city->status}}">
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
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
            $('.select2').select2({
                placeholder: "Select a country",
                allowClear: true
            });
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
