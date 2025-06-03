@extends('admin.layout.app')

@section('styles')
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Bid /</span> List
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="{{ route('admin.bid.create') }}" class="btn btn-primary float-end">Add bid</a>
        </div>
    </div>
    <div class="card p-3">
        <div class="table-responsive text-nowrap">
            <table width="100%" class="table table-striped table-bordered table-hover" id="users_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car Name</th>
                        <th>Bidder</th>
                        <th>Bid Amount (PKR)</th>
                        {{-- <th>Bid Time</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bids as $index => $bid)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $bid->auction->car->name ?? 'Unknown car' }}</td>
                        <td>{{ $bid->user->name ?? 'Unknown User' }}</td>
                        <td>{{ number_format($bid->bid_amount) }}</td>
                        {{-- <td>{{ $bid->created_at->format('d M Y, h:i A') }}</td> --}}
                        <td>
                            @if ($bid->auction->end_date < now())
                                @if (isset($endedAuctions[$bid->auction_id]) && $endedAuctions[$bid->auction_id] == $bid->bid_amount)
                                <span class="badge bg-success p-2">Won</span>
                                @else
                                <span class="badge bg-danger p-2">Lost</span>
                                @endif
                            @else
                                <span class="badge bg-warning text-dark p-2">Running</span>
                            @endif
                        </td>
                        <td>
                            <a class="dropdown-item" href="{{ route('admin.bid.show', $bid->id) }}">
                                <i class="bx bx-show me-1"></i> View</a>
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
        $('#users_table').DataTable({
            responsive: true,
           "order": [
                [4, 'DESC']
            ],
            "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [5]
                },
                {
                    "bSearchable": false,
                    "aTargets": [5]
                }
            ]
        });
    });
</script>
@endsection