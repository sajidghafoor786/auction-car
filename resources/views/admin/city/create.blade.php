@extends('layout.admin')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">City /</span> Add
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
                        <form role="form" action="{{ route('admin.cities.store') }}" class="ajax-form-admin row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control"
                                       placeholder="Enter City Name">
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Country <span class="steric">*</span></label>
                                <select name="country_id" id="country_id" class="form-control select2">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
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
                                <button type="submit" class="btn btn-primary">Save</button>
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
        $('input[name="is_active"]').change(function() {
            if ($(this).is(":checked")) {
                $('input#is_active').val('1');
            } else {
                $('input#is_active').val('0');
            }
        });

        $(document).ready(function () {
            $('#country_id').select2({
                placeholder: "Select Country",
                allowClear: true,
                width: '100%'
            });
            $('input#is_active').val('1');
        });

    </script>
@endsection
