<!doctype html>
<html lang="en" class="no-js">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="meta description">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/x-icon">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @yield('heading')
    <!-- all css -->
    <style>
        :root {
            --primary-color: #F76B6A;
            --secondary-color: #F76B6A;

            --btn-primary-border-radius: 0.25rem;
            --btn-primary-color: #fff;
            --btn-primary-background-color: #F76B6A;
            --btn-primary-border-color: #F76B6A;
            --btn-primary-hover-color: #fff;
            --btn-primary-background-hover-color: #F76B6A;
            --btn-primary-border-hover-color: #F76B6A;
            --btn-primary-font-weight: 500;

            --btn-secondary-border-radius: 0.25rem;
            --btn-secondary-color: #00234D;
            --btn-secondary-background-color: transparent;
            --btn-secondary-border-color: #00234D;
            --btn-secondary-hover-color: #fff;
            --btn-secondary-background-hover-color: #F76B6A;
            --btn-secondary-border-hover-color: #F76B6A;
            --btn-secondary-font-weight: 500;

            --heading-color: #000;
            --heading-font-family: 'Poppins', sans-serif;
            --heading-font-weight: 700;

            --title-color: #000;
            --title-font-family: 'Poppins', sans-serif;
            --title-font-weight: 400;

            --body-color: #000;
            --body-background-color: #fff;
            --body-font-family: 'Poppins', sans-serif;
            --body-font-size: 14px;
            --body-font-weight: 400;

            --section-heading-color: #000;
            --section-heading-font-family: 'Poppins', sans-serif;
            --section-heading-font-size: 48px;
            --section-heading-font-weight: 600;

            --section-subheading-color: #000;
            --section-subheading-font-family: 'Poppins', sans-serif;
            --section-subheading-font-size: 16px;
            --section-subheading-font-weight: 400;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="body-wrapper">
        <!----header start------>
        @include('frontend.inc.header')
        <!----header end------>

        <main id="MainContent" class="content-for-layout">
            @yield('main_content')
        </main>

        <!-- footer start -->
        @include('frontend.inc.footer')
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
        </button>
        <!-- scrollup end -->


        <!-- mobile menu start -->
        @include('frontend.inc.mobile_menu')
        <!-- mobile menu end -->

        <!-- sidebar cart start -->
        @include('frontend.inc.cart_sidebar')
        <!-- sidebar cart end -->
        <!-- all js -->
        <script src="{{ asset('frontend/assets/js/vendor.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        <!---- new add--->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('front_script')
        <script>
            $(document).ready(function() {
                // Delete item on button click
                $('.delete-item').on('click', function() {
                    if (confirm('Are You Sure Delete This Item?')) {
                        var itemId = $(this).closest('.cart-item').data('item-id');
                        $.ajax({
                            url: '/cart/remove/' + itemId,
                            type: 'GET',
                            success: function(response) {
                                if (response.success == true) {
                                    // Remove the deleted item from the DOM
                                    $('[data-item-id="' + itemId + '"]').remove();
                                    alert(response.message)
                                } else {
                                    alert(response.error)
                                }
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <!-- Sweetalert 2 success and error message -->
        @if (session('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                })
            </script>
        @endif

        @if (session('error'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                })
            </script>
        @endif
    </div>
</body>

</html>
