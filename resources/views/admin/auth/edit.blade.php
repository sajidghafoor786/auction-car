@extends('layout.admin')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Users /</span> Edit
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('listUsers') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form role="form" action="{{ route('updateUser') }}" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework ajax-form-admin" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Name <span class="steric">*</span></label>
                                <input type="text" name="name" id="name"
                                       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Name" value="{{ $user->name ?? old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Email <span class="steric">*</span></label>
                                <input type="email" name="email" id="email"
                                       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="Enter Email" value="{{ $user->email ?? old('email') }}" disabled>
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
                                       placeholder="Enter Phone Number" value="{{ $user->phone ?? old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 fv-plugins-icon-container">
                                <label class="form-label">Permissions <span class="steric">*</span></label>
                                <select id="permissions" class="form-control select2 form-select select2-hidden-accessible" name="permissions[]" multiple="" data-select2-id="permissions" tabindex="-1" aria-hidden="true" data-placeholder="Select Permission">
                                    @foreach ($permissions as $permission)
                                        <option @foreach ($user->permissions as $perm)
                                                @if ($perm->id == $permission->id) selected @endif
                                                {{-- @if (in_array($permission->id, old('permissions', $user->permissions->pluck('id')->toArray()))) selected @endif --}}
                                                @endforeach
                                                value="{{$permission->id}}">{{$permission->title}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('permissions'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="mb-3 col-sm-6 col-md-6 col-lg-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="············">
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
                                    @if ($user->status == 0)
                                        <input name="is_active" type="checkbox" class="" data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="{{$user->status}}">
                                    @else
                                        <input name="is_active" type="checkbox" class="" checked data-toggle="toggle">
                                        <input type="hidden" name="is_active" id="is_active" value="{{$user->status}}">
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="hidden" name="id" id="id" class="form-control" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary">Update</button>
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
        $('input[name="is_active"]').change(function() {
            if ($(this).is(":checked")) {
                $('input#is_active').val('1');
            } else {
                $('input#is_active').val('0');
            }
        });
    </script>
@endsection
