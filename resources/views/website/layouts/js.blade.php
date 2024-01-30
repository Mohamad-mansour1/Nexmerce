{{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<script src="{{ asset('assets/js/ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('admin/assets/vendor/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    function isLoading(is_loading) {
        document.getElementById("modal-overlay").style.display = is_loading ? "flex" : "none";
    }

    const Toast = Swal.mixin({
        toast: true,
        icon: "success",
        position: "top-end",
        showConfirmButton: false,
        timer: 7000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    const sweetAlert = (icon, title) => {
        Toast.fire({
            icon: icon,
            title: title,
        });
    };

    let messageType = '';

    @if ($message = session('success'))
        messageType = 'success';
    @elseif ($message = session('warning'))
        messageType = 'warning';
    @elseif ($message = session('error'))
        messageType = 'error';
    @elseif ($message = session('info'))
        messageType = 'info';
    @elseif ($message = session('status'))
        messageType = 'success';
    @endif

    if (messageType && '{{ $message }}' !== '') {
        Toast.fire({
            icon: messageType,
            title: '{{ $message }}'
        });
    }

    $(document).ready(function() {
        $(".add-to-cart").click(function() {
            var productId = $(this).data("product-id");
            var quantity = $("#quantity").val();
            if (!quantity) {
                quantity = 1;
            }

            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.error) {
                        Toast.fire({
                            icon: 'error',
                            title: response.error
                        });
                    } else {
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        $(".remove-form").click(function() {
            var thisButton = $(this);
            var productId = $(this).data("product-id");
            $.ajax({
                type: "POST",
                url: "{{ route('cart.remove') }}",
                data: {
                    product_id: productId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    var productRow = thisButton.closest("tr[data-product-id='" +
                        productId + "']");
                    productRow.remove();
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>
