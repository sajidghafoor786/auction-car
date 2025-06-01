@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Cars /</span> List
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary float-end">Add Car</a>
        </div>
    </div>
    <div class="card p-3">
        <div class="table-responsive text-nowrap">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cars_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->make }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td class="text-center">
                            @if($car->status == 1)
                                <a href="javascript:void(0);" onclick="changeStatus(0, {{ $car->id }});" class="badge bg-success">Active</a>
                            @else
                                <a href="javascript:void(0);" onclick="changeStatus(1, {{ $car->id }});" class="badge bg-danger">Inactive</a>
                            @endif
                        </td>
                        <td>
                            <a class="dropdown-item" href="{{ route('admin.cars.edit', $car->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit</a>

                            <a class="dropdown-item" href="{{ route('admin.cars.show', $car->id) }}">
                                <i class="bx bx-show me-1"></i> View</a>

                            <a class="dropdown-item" href="javascript:void(0);" onclick="deleteCar({{ $car->id }});">
                                <i class="bx bx-trash me-1"></i> Delete</a>
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
        $('#cars_table').DataTable({
            responsive: true,
            "order": [[0, 'desc']],
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6]
            }]
        });
    });

    function deleteCar(carId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this car?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                   url: "{{ url('admin/cars') }}/" + carId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => location.reload(), 1500);
                    }
                });
            }
        });
    }

    function changeStatus(status, carId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to change car status?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.cars.changeStatus') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status,
                        car_id: carId
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        setTimeout(() => location.reload(), 1500);
                    }
                });
            }
        });
    }
</script>
@endsection
