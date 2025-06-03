@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Change Password</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('admin.passwordAdmin') }}" method="POST" enctype="multipart/form-data" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        @csrf
                        <input type="hidden" value="{{Auth::guard()->user()->id}}" name="user_id">
                        <div class="row">
                            <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="newPassword">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="············">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mt-1">
                                <button type="submit" class="btn btn-primary me-2">Update Password</button>
                            </div>
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
    setTimeout(function() {
        document.getElementById('success').style.display = 'none';
    }, 2000);

    setTimeout(function() {
        document.getElementById('error').style.display = 'none';
    }, 2000);
</script>
@endsection