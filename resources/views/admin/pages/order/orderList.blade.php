@extends('admin.layout.app')
@section('title')
    E-SHOP Dashboard
@endsection
@section('pageName')
    OrderList
@endsection
@section('body')
    
    <div>
        <div class="container-fluid py-4 px-4 ">
            <div class="d-sm-flex justify-content-between">
                <!-- <div>
                    <button class="btn btn-icon bg-gradient-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#addCoupen">
                        <span class="btn-inner--icon"><i class="material-icons add-btn">add</i></span>
                        Order
                    </button>
                </div> -->
                <div class="d-flex">
                    <button class="btn btn-icon btn-outline-dark ms-2 export" data-type="csv" type="button">
                        <i class="material-icons text-xs position-relative">archive</i>
                        Export CSV
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Order Table</h5>
                            <p class="text-sm mb-0">
                                View all the Order.
                            </p>
                        </div>
                        <div class="table-responsive">
                            @if ($order->isNotEmpty())
                                <table class="table table-flush align-items-center" id="datatable-search">
                                    <thead class="thead-light">
                                        <tr class="text-center">
                                            <th>OrderId</th>
                                            <th>Custemer</th>
                                            <th>Email</th>
                                            <th>Phone_Number</th>
                                            <th>Status</th>
                                            <th>Payment_Status</th>
                                            <th>Total</th>
                                            <th>Purchas Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr class="text-center">
                                                <td>
                                                    <span class="text-xs">
                                                        <a
                                                            href="{{ route('order-detail', $item->id) }}">OR#{{ $item->id }}</a>

                                                    </span>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../../../assets/img/team-2.jpg"
                                                            class="avatar avatar-xs me-2" alt="user image">
                                                        <span>{{ $item->Users->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="font-weight-normal">
                                                    <span class="my-2 text-xs">{{ $item->Users->email }}</span>
                                                </td>

                                                <td class="text-xs font-weight-normal">
                                                    <span class="my-2 text-xs">{{ $item->phone_no }}</span>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    @if ($item->order_status == 'delivered')
                                                        <span
                                                            class="badge badge-sm bg-gradient-success fontSize">delivered</span>
                                                    @elseif($item->order_status == 'shipping')
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning fontSize">shipping</span>
                                                    @elseif($item->order_status == 'cancelled')
                                                        <span class="badge badge-sm bg-gradient-danger fontSize">
                                                            Cancelled
                                                        </span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-info  fontSize">
                                                            Pending
                                                        </span>
                                                    @endif

                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->payment_status == 'paid')
                                                            <button
                                                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i
                                                                    class="material-icons text-sm"
                                                                    aria-hidden="true">done</i></button>
                                                            <span>Paid</span>
                                                        @else
                                                            <button
                                                                class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i
                                                                    class="material-icons text-sm"
                                                                    aria-hidden="true">clear</i></button>
                                                            <span>un-paid</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <span
                                                        class="my-2 text-xs">{{ number_format($item->grand_total, 2) }}/PKR</span>
                                                </td>
                                                <td class="text-xs font-weight-normal">
                                                    <span class="my-2 text-xs">
                                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d F, Y') }}</span>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center p-5 ">
                                    <span class="text-secondary text-ls font-weight-bold">Record Not Found</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

       

        <!--end  Modal for add product -->
    @endsection
    @section('jsCode')
        {{-- datetime picker  --}}
        <script>
            $(document).ready(function() {
                $('#started_at').datetimepicker({
                    // options here
                    format: 'Y-m-d H:i:s',
                });
            });
            $(document).ready(function() {
                $('#expired_at').datetimepicker({
                    // options here
                    format: 'Y-m-d H:i:s',
                });
            });
        </script>

       
        @if ($errors->any())
            <script>
                $(document).ready(function() {
                    @foreach ($errors->all() as $error)
                        toastr.error('{{ $error }}', 'Error');
                    @endforeach
                });
            </script>
        @endif
        <script>
            const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
                searchable: true,
                fixedHeight: false
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "material-" + type,
                    };

                    if (type === "csv") {
                        data.columnDelimiter = "|";
                    }

                    dataTableSearch.export(data);
                });
            });
        </script>
    @endsection
