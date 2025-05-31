@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Users /</span> Detail
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('admin.listUsers') }}" class="btn btn-primary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="info-container">
                            <ul class="list-unstyled">
                                @if(!empty($user->name))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Username:</span>
                                        <span>{{$user->name}}</span>
                                    </li>
                                @endif
                                @if(!empty($user->email))
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Email:</span>
                                        <span>{{ $user->email }}</span>
                                    </li>
                                @endif
                               
                                    <li class="mb-3">
                                        <span class="fw-medium me-2">Phone:</span>
                                        <span>{{ $user->phone ?? 'N/A'}}</span>
                                    </li>
                             
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Type:</span>
                                    @if($user->user_type == 1)
                                        <span class="badge bg-label-success">{{ 'Admin' }}</span>
                                    @else
                                        <span class="badge bg-label-danger">{{ 'User' }}</span>
                                    @endif
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Status:</span>
                                    @if($user->status == 1)
                                        <span class="badge bg-label-success">{{ 'Active' }}</span>
                                    @else
                                        <span class="badge bg-label-danger">{{ 'Inactive' }}</span>
                                    @endif
                                </li>
                                <li class="mb-3">
                                    <span class="fw-medium me-2">Joining:</span>
                                  <span>{{ $user->created_at }}</span>
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

