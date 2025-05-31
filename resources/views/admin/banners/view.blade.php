@extends('layout.admin')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
        
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <div class="header-card d-flex ">
                                
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Banner Details</h4>
                                <a href="{{ route('listBanners') }}" class="btn btn-primary">Back</a>
                            </div>
                            <table class="table table-bordered w-100 mb-3">
                                <table class="table table-bordered w-100 mb-3">
                                    <tbody>

                                        <tr class="mb-3">
                                            <th class="w-25">Name</th>
                                            <td>{{ !empty($banner->name) ? $banner->name : 'N/A' }}</td>
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Type Of Banner</th>
                                            <td>{{ !empty($banner->type) ? $banner->type : 'N/A' }}</td>
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Short Description</th>
                                            <td>
                                                @php
                                                    $cleanDescription = trim(strip_tags(html_entity_decode($banner->description)));
                                                @endphp
                                                {{ !empty($cleanDescription) ? $cleanDescription : 'N/A' }}
                                            </td>
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Name Color</th>
                                            <td>
                                                @if (!empty($banner->name_color))
                                                    <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $banner->name_color }}; border: 1px solid #ccc; vertical-align: middle; margin-right: 5px;"></span>
                                                    <span>{{ $banner->name_color }}</span>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Short Description Color</th>
                                            <td>
                                                @if (!empty($banner->description_color))
                                                    <span class="d-inline-block" style="width: 20px; height: 20px; background-color: {{ $banner->description_color }}; border: 1px solid #ccc; vertical-align: middle; margin-right: 5px;"></span>
                                                    <span>{{ $banner->description_color }}</span>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Image</th>
                                            <td>
                                                @if (!empty($banner->image_url) && file_exists(public_path('storage/' . $banner->image_url)))
                                                    <a href="{{ asset('storage/' . $banner->image_url) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                                @else
                                                    <span class="text-muted">No Image Available</span>
                                                @endif
                                            </td>
                                            
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Image For Mobile Device</th>
                                            <td>
                                                @if (!empty($banner->mobile_device_image) && file_exists(public_path('storage/' . $banner->mobile_device_image)))
                                                    <a href="{{ asset('storage/' . $banner->mobile_device_image) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                                @else
                                                    <span class="text-muted">No Image Available</span>
                                                @endif
                                            </td>
                                        </tr>


                                        <tr class="mb-3">
                                            <th class="w-25">Externel Link</th>
                                            <td>{{ !empty($banner->link_url) ? $banner->link_url : 'N/A' }}</td>
                                        </tr>

                                        <tr class="mb-3">
                                            <th class="w-25">Status </th>
                                            <td>
                                                @if($banner->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                        </div>
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
