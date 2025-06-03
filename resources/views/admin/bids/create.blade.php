@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-2">
        <span class="text-muted fw-light">Bids /</span> Add
    </h4>
    <div class="row mb-2">
        <div class="col-lg-12">
            <a href="{{ route('admin.bid.index') }}" class="btn btn-primary float-end">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.bid.store') }}" >
                        @csrf
                        <div class="row mb-3">
                            <div class="form-group col-sm-6 mb-2">
                                <label>User</label>
                                <select name="user_id" class="form-control">
                                    <option value="">-- Select User --</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ isset($bid) && $bid->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label>Auction</label>
                                <select name="auction_id" class="form-control">
                                    <option value="">-- Select Auction  --</option>
                                    @foreach($auctions as $auction)
                                    <option value="{{ $auction->id }}" {{ isset($bid) && $bid->auction_id == $auction->id ? 'selected' : '' }}>
                                        {{ $auction->car->name ?? 'N/A' }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6 mb-2">
                                <label>Bid Amount</label>
                                <input type="number" name="bid_amount" class="form-control" value="{{ $bid->bid_amount ?? '' }}">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Save</button>
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