@extends('admin.layout.app')

@section('styles')
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Car Auctions /</span> List
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="{{ route('admin.carAuction.create') }}" class="btn btn-primary float-end">Add Car Auction</a>
        </div>
    </div>
    <div class="card p-3">
        <div class="table-responsive text-nowrap">
            <table width="100%" class="table table-striped table-bordered table-hover" id="carAuction_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car</th>
                        <th>Minimum Bid</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($carAuctions as $auction)
                    <tr>
                        <td>{{ $auction->id }}</td>
                        <td>{{ $auction->car->name ?? 'N/A' }}</td>
                        <td>{{ $auction->minimum_bid }} / PKR</td>
                        <td>{{ \Carbon\Carbon::parse($auction->start_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($auction->end_date)->format('d M Y') }}</td>
                        <td class="text-center">
                            @if($auction->status == 'active')
                                <a href="javascript:void(0);" onclick="changeStatus('closed', {{ $auction->id }});" class="badge bg-success">Active</a>
                            @else
                                <a href="javascript:void(0);" onclick="changeStatus('active', {{ $auction->id }});" class="badge bg-danger">Closed</a>
                            @endif
                        </td>
                        <td>
                            <a class="dropdown-item" href="{{ route('admin.carAuction.edit', $auction->id) }}">
                                <i class="bx bx-edit-alt me-1"></i> Edit</a>

                            <a class="dropdown-item" href="{{ route('admin.carAuction.show', $auction->id) }}">
                                <i class="bx bx-show me-1"></i> View</a>

                            <a class="dropdown-item" href="javascript:void(0);" onclick="deleteAuction({{ $auction->id }});">
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
        $('#carAuction_table').DataTable({
            responsive: true,
            "order": [[0, 'desc']],
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [6]
            }]
        });
    });

    function deleteAuction(auctionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this auction?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "{{ url('admin/carAuction') }}/" + auctionId,
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

    function changeStatus(status, auctionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to change auction status?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.carAuction.changeStatus') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status,
                        auction_id: auctionId
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
