@extends('layout.admin')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(session('success'))
            <div id="success" class="alert alert-primary alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div id="error" class="alert alert-danger alert-dismissible" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h4 class="py-3 mb-2">
            <span class="text-muted fw-light">Banners /</span> List
        </h4>
        <div class="row mb-2">
            <div class="col-lg-12">
                <a href="{{ route('createBanner') }}" class="btn btn-primary float-end">Add Banner</a>
            </div>
        </div> 
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <table width="100%" class="table table-striped table-bordered table-hover" id="banner_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    @foreach($banners as $banner)
                    <tr class="odd gradeX">
                        <td>{{$banner->id}}</td>
                        <td>{{$banner->name}}</td>
                        <td>{{$banner->type}}</td>
                        <td>
                            @php
                                $cleanDescription = trim(str_replace('&nbsp;', '', strip_tags($banner->description)));
                            @endphp
                            {{ $cleanDescription ? Str::limit($cleanDescription, 20, '...') : '—' }}
                        </td>
                        @if(isset($banner->image_url))
                            <td><img src="{{ asset(Storage::url($banner->image_url)) }}"
                                     class="w-px-100"></td>
                        @else
                            <td><img src="{{ asset('assets/img/avatars/placeholder.png')}}" alt="Banner Image"
                                     class="w-px-100"></td>
                        @endif
                        <td class="text-center">
                            @if($banner->status == 1)
                                <a href="javascript:void(0);" onclick="bannerChangeStatus('0',{{$banner->id}});"
                                   class="badge bg-success"> Active </a>
                            @else
                                <a href="javascript:void(0);" onclick="bannerChangeStatus('1',{{$banner->id}});"
                                   class="badge bg-danger"> Inactive </a>
                            @endif
                        <td>
                            {{-- <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editBanner', $banner->id) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >
                                  
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="bannerDelete({{$banner->id}});">
                                        <i class="bx bx-trash me-1"></i> Delete</a
                                    >
                                </div>
                            </div> --}}
                        
                                    <a class="dropdown-item" href="{{ route('editBanner', $banner->id) }}"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >

                                    <a class="dropdown-item" href="{{ route('viewBanner', $banner->id) }}">
                                        <i class="bx bx-show me-1"></i> View
                                    </a>
                     
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="bannerDelete({{$banner->id}});">
                                        <i class="bx bx-trash me-1"></i> Delete</a
                                    >
                            
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#banner_table').DataTable({
                responsive: true,
                "order": [],
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [3,4, 5]
                },
                    {
                        "bSearchable": false,
                        "aTargets": [3,4, 5]
                    }
                ]
            });
        });
    </script>

    <script>
        function bannerChangeStatus(status, bannerId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change banner status?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: "POST",
                        url: "{{ route('bannerChangeStatus') }}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            'status': status,
                            'banner_id': bannerId
                        },
                        success: function (response) {
                            notifyBlackToast(response.message);
                            location.reload();

                        }
                    });


                }
            })

        }

        function bannerDelete(bannerId) {
            var result = window.confirm('Are you sure you want to delete this banner');
            if (result == false) {
                event.preventDefault();
            } else {

                // ajax call here

                $.ajax({
                    method: "POST",
                    url: "{{ route('bannerDelete') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        'banner_id': bannerId
                    },
                    success: function(response) {
                        notifyBlackToast(response.message);
                        location.reload();

                    }
                });
            }
        }
    </script>

    <script>
        setTimeout(function(){
            document.getElementById('success').style.display = 'none';
        }, 2000);

        setTimeout(function(){
            document.getElementById('error').style.display = 'none';
        }, 2000);
    </script>
@endsection
