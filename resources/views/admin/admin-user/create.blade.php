@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Users /</span> Add
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('admin.listUsers') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ route('admin.saveUser') }}" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Email <span class="steric">*</span></label>
                                <input type="text" name="email" id="email"
                                       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Phone No. <span class="steric">*</span></label>
                                <input type="text" name="phone" id="phone"
                                       class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Phone Number" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                               <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label"> User Type <span class="steric">*</span></label>
                                 <select name="user_type" id="user_role" class="form-control select">
                                    <option value="" selected>Select Type</option>
                                    <option value="1" > Admin</option>
                                    <option value="0" >User</option>
                                </select>
                            </div>

                            <div class="mb-3 col-sm-6 col-md-6 col-lg-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label">Password <span class="steric">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" name="password" type="password" id="password" value="{{ old('password') }}"  placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label">Confirm Password <span class="steric">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" value="{{ old('confirm_password') }}" type="password" id="confirm_password" name="confirm_password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @if ($errors->has('confirm_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
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
            <!-- /FormValidation -->
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
