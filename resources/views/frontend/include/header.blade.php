<header class="py-3" >
    <div class="container">
        <nav class="navbar navbar-expand-xl" id="navbar">
            <div class="col-lg-4 logo">
                <a href="{{ url('/') }}" class="text-decoration-none text-white fw-bold fs-5">
                    <i class="fa fa-car me-2"></i> Auction Car
                </a>
            </div>
            <button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icon-menu"></span>
                <i class="navbar-toggler-icon fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">About us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" title="Products">Help</a>
                    </li>
                </ul>
                <div class="col-lg-6  col-6  d-flex justify-content-end align-items-center">
                    @if (Auth::check())
                        <a href="{{ route('user.profile') }}" class="nav-link text-white "><b>{{ auth()->user()->name }}
                            </b></a>
                    @else
                        <a href="{{ route('user.login') }}"
                            class="nav-link text-white me-2 justify-content-start d-flex"><i
                                class="far fa-user me-2 mt-1"></i> Login</a>
                    @endif

                    <form action="{{ url('/') }}" method="GET" class="d-flex search-form w-50">
                        <input type="text" placeholder="Search For Car" value="{{ Request::get('Search') }}"
                            class="form-control form-control-sm me-1 py-2" name="Search" id="searchInput" >
                        
                    </form>
                    
                </div>
            </div>

        </nav>
    </div>
</header>
@section('custemjs')
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchQuery = $(this).val();

                $.ajax({
                    url: '{{ route('ajax.search.auctions') }}',
                    method: 'GET',
                    data: {
                        search: searchQuery
                    },
                    success: function(response) {
                     $('#activeAuctions').empty();
                        $('#activeAuctions').html(response.html);
                    },
                    error: function(xhr) {
                        console.log("Error: ", xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
