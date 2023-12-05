@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website">
    <meta property="og:description" content="E-COM-STR E-Commerce Website">
    <meta property="og:image" content="E-COM-STR E-Commerce Website" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website" />
    <meta name="description" content="E-COM-STR E-Commerce Website" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website</title>
@endsection
@section('main_content')
    <!-- slideshow first bannner section start -->
    @include('frontend.home.first_banner')
    <!-- slideshow first banner section end -->

    <!-- just for you start -->
    @include('frontend.home.just_for_you')
    <!-- category  end -->

    <!-- popular product section start -->
    @include('frontend.home.popular_product')
    <!-- popular product section end -->

    <!-- second banner start -->
    <div class="banner-section mt-100 overflow-hidden">
        <div class="banner-section-inner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right" data-aos-duration="1200">
                        <a class="banner-item position-relative rounded">
                            <img class="banner-img" src="{{ asset('frontend/assets/img/banner/shoe-1.jpg') }}"
                                alt="banner-1">
                            <div class="content-absolute content-slide">
                                <div class="container height-inherit d-flex align-items-center">
                                    <div class="content-box banner-content p-4">
                                        <p class="heading_18 mb-3 text-white">Sports Shoes</p>
                                        <h2 class="heading_34 text-white">25% off for <br>sports men</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="1200">
                        <a class="banner-item position-relative rounded">
                            <img class="banner-img" src="{{ asset('frontend/assets/img/banner/shoe-2.jpg') }}"
                                alt="banner-2">
                            <div class="content-absolute content-slide">
                                <div class="container height-inherit d-flex align-items-center">
                                    <div class="content-box banner-content p-4">
                                        <p class="heading_18 mb-3 text-white">Sports Shoes</p>
                                        <h2 class="heading_34 text-white">25% off for <br>sports women</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- second banner end -->

    <!-- category start -->
    <div class="instagram-section mt-100 overflow-hidden home-section">
        <div class="instagram-inner">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-heading">Top Category</h2>
                    <p class="section-subheading">Most Beautiful Category</p>
                </div>
                <div class="instagram-container position-relative mt-48">
                    <div class="common-slider"
                        data-slick='{
                            "slidesToShow": 4, 
                            "slidesToScroll": 1,
                            "dots": false,
                            "arrows": true,
                            "responsive": [
                              {
                                "breakpoint": 1281,
                                "settings": {
                                  "slidesToShow": 3
                                }
                              },
                              {
                                "breakpoint": 768,
                                "settings": {
                                  "slidesToShow": 2
                                }
                              }
                            ]
                        }'>
                        @foreach ($common_categories as $category)
                            <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                                <div class="instagram-card">
                                    <a class="instagram-img-wrapper"
                                        href="{{ route('category.product.show', $category->slug) }}">
                                        <span>{{ $category->title }}</span>
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}"
                                            class="instagram-card-img rounded" title="{{ $category->title }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- category  end -->

    <!-- trusted badge start -->
    <div class="trusted-section mt-100 overflow-hidden">
        <div class="trusted-section-inner">
            <div class="container">
                <div class="row justify-content-center trusted-row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="trusted-badge bg-trust-1 rounded">
                            <div class="trusted-icon">
                                <img class="icon-trusted" src="{{ asset('frontend/assets/img/trusted/1.png') }}"
                                    alt="icon-1">
                            </div>
                            <div class="trusted-content">
                                <h2 class="heading_18 trusted-heading">Free Shipping & Return</h2>
                                <p class="text_16 trusted-subheading trusted-subheading-2">On all order over
                                    TK2500.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="trusted-badge bg-trust-2 rounded">
                            <div class="trusted-icon">
                                <img class="icon-trusted" src="{{ asset('frontend/assets/img/trusted/2.png') }}"
                                    alt="icon-2">
                            </div>
                            <div class="trusted-content">
                                <h2 class="heading_18 trusted-heading">Customer Support 24/7</h2>
                                <p class="text_16 trusted-subheading trusted-subheading-2">Instant access to
                                    support</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="trusted-badge bg-trust-3 rounded">
                            <div class="trusted-icon">
                                <img class="icon-trusted" src="{{ asset('frontend/assets/img/trusted/3.png') }}"
                                    alt="icon-3">
                            </div>
                            <div class="trusted-content">
                                <h2 class="heading_18 trusted-heading">100% Secure Payment</h2>
                                <p class="text_16 trusted-subheading trusted-subheading-2">We ensure secure
                                    payment!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- trusted badge end -->

    <!-- brand logo start -->
    <div class="brand-logo-section mt-100">
        <div class="brand-logo-inner">
            <div class="container">
                <div class="brand-logo-container overflow-hidden">
                    <div class="scroll-horizontal row align-items-center flex-nowrap">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="#" class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('frontend/assets/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo end -->
@endsection

@section('front_script')
    <script>
        $(document).ready(function() {
            //----add wishlist product
            $('.add_to_wishlist').click(function() {
                const product_id = $(this).data('id');
                const user_id = $(this).data('user');
                $.ajax({
                    type: 'POST',
                    url: '/product/wishlist',
                    data: {
                        product_id: product_id,
                        user_id: user_id
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
