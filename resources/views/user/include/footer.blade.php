<footer class="bg-dark mt-5">
    <div class="container pb-5 pt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-card">
                    <h3>Get In Touch</h3>
                    <p>No dolore ipsum accusam no lorem. <br>
                        123 Street, New York, USA <br>
                        exampl@example.com <br>
                        000 000 0000</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card">
                    <h3>Important Links</h3>
                    <ul>
                        <li><a href="about-us.php" title="About">About</a></li>
                        <li><a href="contact-us.php" title="Contact Us">Contact Us</a></li>
                        <li><a href="#" title="Privacy">Privacy</a></li>
                        <li><a href="#" title="Privacy">Terms & Conditions</a></li>
                        <li><a href="#" title="Privacy">Refund Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card">
                    <h3>My Account</h3>
                    <ul>
                        <li><a href="{{ route('user.login') }}" title="Sell">Login</a></li>
                        <li><a href="{{ route('user.register') }}" title="Advertise">Register</a></li>
                        <li><a href="{{ route('user.MyOrder') }}" title="Contact Us">My Orders</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="copy-right text-center">
                        <p>© Copyright 2022 Amazing Shop. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js ') }}"></script>
<script src="{{ asset('assets/js/custom.js ') }}"></script>
@yield('custemjs')
<script>
  window.addEventListener('load', () => {
    setTimeout(() => {
      const preloader = document.getElementById('preloader');
      if (preloader) {
        preloader.style.opacity = '0';
        preloader.style.transition = 'opacity 0.5s ease';
        setTimeout(() => {
          preloader.style.display = 'none';
        }, 100);
      }
    }, 1000); // 1 seconds
  });
</script>
{{-- add tio cart js here  --}}

<script>
    // add to cart function 
    function addToCart(id) {
        // Get the CSRF token from the page's meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        //   alert(id);
        $.ajax({
            url: "{{ route('user.add-to-cart') }}",
            type: "post",
            data: {
                id: id,
                _token: csrfToken // Include the CSRF token in the data
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);

                if (response.message === 'You are not authenticated please login first.') {
                    // Redirect to the login page
                    window.location.href = "{{ route('user.login') }}";
                } else if (response.message === 'Product is already in the cart.') {
                    toastr.error('Product is already in the cart.', 'Error!');
                    // Handle as needed
                } else {
                    // Handle success
                    toastr.success('Product is added in the cart Successfully.', 'Success!');
                }
            },

        });
    }
    // Add To Wishlist product 
    function WishList(id) {
        // Get the CSRF token from the page's meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        //   alert(id);
        $.ajax({
            url: "{{ route('user.wishlist-added') }}",
            type: "post",
            data: {
                id: id,
                _token: csrfToken // Include the CSRF token in the data
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                if (response.message === 'Not authenticated') {
                    // Redirect to the login page
                    window.location.href = "{{ route('user.login') }}";
                } else if (response.message === 'Product already in wishlist') {
                    toastr.error('Product already in wishlist.', 'Error!');
                  
                } else {
                    // Handle success
                    toastr.success("Product added in wishlist successfully", 'Success!');
                }
            },

        });
    }
</script>

<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
<script>
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true,
            "timeOut": "5000",
            " overlay": true,
            //    "extendedTimeOut" = "5000",
        };

        // Function to get Toastr options
        function getOptions() {
            toastr.options = toastr.options || {};
            return Object.assign({}, getDefaults(), toastr.options);
        }
        // showToast('success', 'Operation completed successfully');
        // Function to show Toastr message
        // console.log("Toastr code will execute next on the home page.");

        function showToast(status, message) {
            switch (status) {
                case 'success':
                    toastr.success(message, 'Success!');
                    break;
                case 'delete':
                    toastr.warning(message, 'Delete!');
                    break;
                case 'warning':
                    toastr.warning(message, 'Warning!');
                    break;
                case 'update':
                    toastr.info(message, 'Update!');
                    break;
                case 'error':
                    toastr.error(message, 'Error!');
                    break;
                default:
                    break;
            }
        }

        // Show Toastr message if session message exists
        @if (Session::has('message') && Session::has('status'))
            showToast("{{ Session::get('status') }}", "{{ Session::get('message') }}");
        @endif
    });
</script>
