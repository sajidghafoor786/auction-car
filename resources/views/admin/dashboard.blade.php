@extends('admin.layout.app')

@section('styles')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="row">
               
<div class="col-sm-4 col-md-4 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-info">
                    <p class="card-text">Total Packages (Umrah)</p>
                    <div class="d-flex align-items-end mb-2">
                        <h4 class="card-title mb-0 me-2">{{ $totalPackageUmrahCount ?? 0 }}</h4>
                    </div>
                </div>
                <div class="card-icon">
                    <span class="badge bg-label-success rounded p-2">
                        <i class="bx bx-category bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-4 col-md-4 col-lg-4 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-info">
                    <p class="card-text">Total Packages (Hajj)</p>
                    <div class="d-flex align-items-end mb-2">
                        <h4 class="card-title mb-0 me-2">{{ $totalPackageHajjCount ?? 0 }}</h4>
                    </div>
                </div>
                <div class="card-icon">
                    <span class="badge bg-label-success rounded p-2">
                        <i class="bx bx-category bx-sm"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
    </div>
@endsection
@section('script')

{{--
<script>
    $(document).ready(function() {
        var option =  $('#date_type').find(":selected").val()
        var custom_date =  $("#custom_date_input").val();
        var date_range = $("#custom_date_range_input").val();
        getstats(option,custom_date,date_range);
    });

    $(function () {
        $('#custom_date_range_input').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY', 
                separator: ' - ' 
            },
            startDate: moment('{{ \Carbon\Carbon::now()->startOfMonth()->format('d/m/Y') }}', 'DD/MM/YYYY'),
            endDate: moment('{{ \Carbon\Carbon::now()->day(20)->format('d/m/Y') }}', 'DD/MM/YYYY'),
        }, function (start, end, label) {
        });

        $('#custom_date_range_input').on('apply.daterangepicker', function(ev, picker) {
            var option =  $('#date_type').find(":selected").val()
            var custom_date =  $("#custom_date_input").val();
            var date_range = $("#custom_date_range_input").val();
            getstats(option,custom_date,date_range);
        });

        $('#custom_date_input').daterangepicker({
            singleDatePicker: true,
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY', 
                separator: ' - '    
            },
        }, function(start, end, label) {
        });

        $('#custom_date_input').on('apply.daterangepicker', function(ev, picker) {
            var option =  $('#date_type').find(":selected").val()
            var custom_date =  $("#custom_date_input").val();
            var date_range = $("#custom_date_range_input").val();
            getstats(option,custom_date,date_range);
        });
    });

    $("#date_type").change(function (e) {
        e.preventDefault();
        var option =  $('#date_type').find(":selected").val()
        if (option == 5) {
            $("#custom_date_range").addClass('visually-hidden');
            $("#custom_date_range_input").attr('disabled', true);
            $("#custom_date").removeClass('visually-hidden');
            $("#custom_date_input").attr('disabled', false);
        }else if(option == 6){
            $("#custom_date_range").removeClass('visually-hidden');
            $("#custom_date_range_input").attr('disabled', false);
            $("#custom_date").addClass('visually-hidden');
            $("#custom_date_input").attr('disabled', true);
        }else {
            $("#custom_date").addClass('visually-hidden');
            $("#custom_date_input").attr('disabled', true);
            $("#custom_date_range").addClass('visually-hidden');
            $("#custom_date_range_input").attr('disabled', true);
        }

        var custom_date =  $("#custom_date_input").val();
        var date_range = $("#custom_date_range_input").val();
        getstats(option,custom_date,date_range);
    });

    function getstats(option,custom_date,date_range) {
        $.ajax({
            method: "GET",
            url: "",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'date_type': option,
                'custom_date': custom_date,
                'date_range': date_range
            },
            success: function (response) {
                if (response.status == 1) {
                    $("#append").html(response.html);

                }
            }
        });
    }
</script>
--}}

<script>

    $(document).ready(function() {
        getstats();
    });

    function getstats() {
        $.ajax({
            method: "GET",
            url: "",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status == 1) {
                    $("#append").html(response.html);
                }
            }
        });
    }
</script>
@endsection
