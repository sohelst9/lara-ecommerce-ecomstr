@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | {{ $product->name }}">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | {{ $product->name }}">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | {{ $product->name }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | {{ $product->name }}" />
    <meta name="description" content="E-COM-STR E-Commerce Website | {{ $product->name }}" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | {{ $product->name }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | {{ $product->name }}</title>
@endsection
@section('main_content')
    <!-- breadcrumb start -->
    <div class="breadcrumb">
        <div class="container">
            <ul class="list-unstyled d-flex align-items-center m-0">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>
                    <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path
                                d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                fill="#000" />
                        </g>
                    </svg>
                </li>
                <li>Products/ {{ $product->name }}</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->
    <main id="MainContent" class="content-for-layout">
        <div class="product-page mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-gallery product-gallery-vertical d-flex">
                            <div class="product-img-large">
                                <div class="img-large-slider common-slider"
                                    data-slick='{
                                    "slidesToShow": 1, 
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": false,
                                    "asNavFor": ".img-thumb-slider"
                                }'>
                                    @if ($product->gallery_images)
                                        @foreach ($product->gallery_images as $gallery_image)
                                            <div class="img-large-wrapper">
                                                <a href="{{ asset($gallery_image->gallery_image) }}"
                                                    data-fancybox="gallery">
                                                    <img src="{{ asset($gallery_image->gallery_image) }}" alt="img">
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="product-img-thumb">
                                <div class="img-thumb-slider common-slider" data-vertical-slider="true"
                                    data-slick='{
                                    "slidesToShow": 5, 
                                    "slidesToScroll": 1,
                                    "dots": false,
                                    "arrows": true,
                                    "infinite": false,
                                    "speed": 300,
                                    "cssEase": "ease",
                                    "focusOnSelect": true,
                                    "swipeToSlide": true,
                                    "asNavFor": ".img-large-slider"
                                }'>
                                    @if ($product->gallery_images)
                                        @foreach ($product->gallery_images as $gallery_image)
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ asset($gallery_image->gallery_image) }}" alt="img">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div
                                    class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <div class="product-details ps-lg-4">
                                @if ($product->quantity > 0)
                                    <div class="mb-3"><span class="product-availability">In Stock</span></div>
                                @else
                                    <div class="mb-3"><span class="product-availability">Stock Not Available</span></div>
                                @endif
                                <h2 class="product-title mb-3">{{ $product->name }}</h2>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="product-price-wrapper mb-4">
                                    <span
                                        class="product-price regular-price {{ $product->discount ? 'text-decoration-line-through' : '' }}">&#2547;
                                        {{ $product->price }}</span>

                                    @if ($product->discount)
                                        <span class="card-price-compare">&#2547; {{ $product->discount_price }}</span>
                                    @endif
                                </div>
                                <div class="product-variant-wrapper">
                                    <div class="product-variant product-variant-color">
                                        <strong class="label mb-1 d-block">Color:</strong>
                                        <select name="color_id" id="color_id">
                                            <option value="">select</option>
                                            @foreach ($products_colors as $color)
                                                <option value="{{ $color->Color?->id }}">{{ $color->Color?->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="product-variant product-variant-other">
                                        <strong class="label mb-1 d-block">Size:</strong>
                                        <select name="size_id" id="size_id"></select>
                                    </div>

                                    <div class="mb-3"><span class="">In Stock : <span
                                                id="stock_quantity"></span></span>
                                    </div>
                                </div>

                                <div class="misc d-flex align-items-end justify-content-between mt-4">
                                    <div class="quantity d-flex align-items-center justify-content-between">
                                        <button class="qty-btn dec-qty"><img
                                                src="{{ asset('frontend/assets/img/icon/minus.svg') }}"
                                                alt="minus"></button>
                                        <input class="qty-input" type="number" name="quantity" readonly value="0"
                                            min="0">
                                        <button class="qty-btn inc-qty"><img
                                                src="{{ asset('frontend/assets/img/icon/plus.svg') }}"
                                                alt="plus"></button>
                                    </div>

                                </div>
                                <h3 id="error_msg" class="text-danger mt-2"></h3>
                                <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                    @auth('web')
                                        <button type="submit" class="position-relative btn-atc btn-add-to-cart loader">ADD TO
                                            CART</button>
                                    @else
                                        <a href="{{ route('login') }}" class="position-relative btn-atc btn-add-to-cart loader">ADD TO
                                            CART</a>
                                    @endauth
                                </div>
                                
                                <div class="share-area mt-4 d-flex align-items-center">
                                    <strong class="label mb-1 d-block">Share:</strong>
                                    <ul class="list-unstyled share-list d-flex align-items-center mb-1 flex-wrap">
                                        <li class="share-item">
                                            <svg width="9" height="16" viewBox="0 0 9 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.17383 9.3125L8.58398 6.61719H5.97656V4.85938C5.97656 4.09766 6.32812 3.39453 7.5 3.39453H8.70117V1.08008C8.70117 1.08008 7.61719 0.875 6.5918 0.875C4.45312 0.875 3.04688 2.19336 3.04688 4.53711V6.61719H0.644531V9.3125H3.04688V15.875H5.97656V9.3125H8.17383Z"
                                                    fill="black" />
                                            </svg>
                                        </li>
                                        <li class="share-item">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.1452 6.62529C17.1452 6.79391 17.1452 6.94848 17.1452 7.08899C17.1452 8.35363 16.9063 9.60422 16.4286 10.8407C15.9789 12.0492 15.3185 13.1593 14.4473 14.171C13.6042 15.1827 12.4941 16.0117 11.1171 16.6581C9.76815 17.2763 8.27869 17.5855 6.64871 17.5855C4.59719 17.5855 2.71429 17.0375 1 15.9415C1.28103 15.9696 1.57611 15.9836 1.88525 15.9836C3.59953 15.9836 5.13115 15.4637 6.48009 14.4239C5.66511 14.3958 4.93443 14.1429 4.28806 13.6651C3.66979 13.1874 3.24824 12.5831 3.02342 11.8525C3.24824 11.9087 3.47307 11.9368 3.69789 11.9368C4.03513 11.9368 4.35831 11.8806 4.66745 11.7681C3.82436 11.5995 3.12178 11.178 2.55972 10.5035C1.99766 9.82904 1.71663 9.05621 1.71663 8.18501C1.71663 8.15691 1.71663 8.14286 1.71663 8.14286C2.25059 8.42389 2.81265 8.57845 3.40281 8.60656C2.30679 7.84777 1.75878 6.82201 1.75878 5.52927C1.75878 4.8548 1.9274 4.23653 2.26464 3.67447C3.19204 4.79859 4.30211 5.69789 5.59485 6.37237C6.91569 7.04684 8.33489 7.42623 9.85246 7.51054C9.79625 7.22951 9.76815 6.94848 9.76815 6.66745C9.76815 5.65574 10.1194 4.79859 10.822 4.09602C11.5527 3.36534 12.4239 3 13.4356 3C14.5035 3 15.4028 3.37939 16.1335 4.13817C16.9766 3.96956 17.7635 3.67447 18.4941 3.25293C18.2131 4.12412 17.6651 4.79859 16.8501 5.27635C17.6089 5.19204 18.3255 5.00937 19 4.72834C18.4941 5.45902 17.8759 6.09133 17.1452 6.62529Z"
                                                    fill="black" />
                                            </svg>
                                        </li>
                                        <li class="share-item">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.99998 2.62165C12.4031 2.62165 12.6877 2.6308 13.6367 2.6741C14.5142 2.71415 14.9908 2.86077 15.3079 2.98398C15.728 3.14725 16.0278 3.34231 16.3428 3.65723C16.6577 3.97215 16.8528 4.272 17.016 4.69206C17.1392 5.00923 17.2859 5.48577 17.3259 6.36323C17.3692 7.31228 17.3783 7.5969 17.3783 10C17.3783 12.4031 17.3692 12.6878 17.3259 13.6368C17.2859 14.5143 17.1392 14.9908 17.016 15.308C16.8528 15.728 16.6577 16.0279 16.3428 16.3428C16.0278 16.6577 15.728 16.8528 15.3079 17.016C14.9908 17.1393 14.5142 17.2859 13.6367 17.3259C12.6879 17.3692 12.4032 17.3784 9.99998 17.3784C7.59672 17.3784 7.3121 17.3692 6.36323 17.3259C5.48574 17.2859 5.00919 17.1393 4.69206 17.016C4.27196 16.8528 3.97212 16.6577 3.6572 16.3428C3.34227 16.0279 3.14721 15.728 2.98398 15.308C2.86073 14.9908 2.71411 14.5143 2.67406 13.6368C2.63076 12.6878 2.62162 12.4031 2.62162 10C2.62162 7.5969 2.63076 7.31228 2.67406 6.36326C2.71411 5.48577 2.86073 5.00923 2.98398 4.69206C3.14721 4.272 3.34227 3.97215 3.6572 3.65723C3.97212 3.34231 4.27196 3.14725 4.69206 2.98398C5.00919 2.86077 5.48574 2.71415 6.36319 2.6741C7.31224 2.6308 7.59687 2.62165 9.99998 2.62165ZM9.99998 1C7.55571 1 7.24926 1.01036 6.28931 1.05416C5.33133 1.09789 4.67712 1.25001 4.10462 1.47251C3.51279 1.70251 3.01088 2.01025 2.51055 2.51058C2.01021 3.01092 1.70247 3.51283 1.47247 4.10466C1.24997 4.67716 1.09785 5.33137 1.05412 6.28935C1.01032 7.24926 1 7.55575 1 10C1 12.4443 1.01032 12.7508 1.05412 13.7107C1.09785 14.6687 1.24997 15.3229 1.47247 15.8954C1.70247 16.4872 2.01021 16.9891 2.51055 17.4895C3.01088 17.9898 3.51279 18.2975 4.10462 18.5275C4.67712 18.75 5.33133 18.9021 6.28931 18.9459C7.24926 18.9897 7.55571 19 9.99998 19C12.4443 19 12.7507 18.9897 13.7107 18.9459C14.6686 18.9021 15.3228 18.75 15.8953 18.5275C16.4872 18.2975 16.9891 17.9898 17.4894 17.4895C17.9898 16.9891 18.2975 16.4872 18.5275 15.8954C18.75 15.3229 18.9021 14.6687 18.9458 13.7107C18.9896 12.7508 19 12.4443 19 10C19 7.55575 18.9896 7.24926 18.9458 6.28935C18.9021 5.33137 18.75 4.67716 18.5275 4.10466C18.2975 3.51283 17.9898 3.01092 17.4894 2.51058C16.9891 2.01025 16.4872 1.70251 15.8953 1.47251C15.3228 1.25001 14.6686 1.09789 13.7107 1.05416C12.7507 1.01036 12.4443 1 9.99998 1ZM9.99998 5.37838C7.44753 5.37838 5.37835 7.44757 5.37835 10C5.37835 12.5525 7.44753 14.6217 9.99998 14.6217C12.5524 14.6217 14.6216 12.5525 14.6216 10C14.6216 7.44757 12.5524 5.37838 9.99998 5.37838ZM9.99998 13C8.34314 13 6.99996 11.6569 6.99996 10C6.99996 8.34317 8.34314 7 9.99998 7C11.6568 7 13 8.34317 13 10C13 11.6569 11.6568 13 9.99998 13ZM15.8842 5.19579C15.8842 5.79226 15.4007 6.27581 14.8042 6.27581C14.2077 6.27581 13.7242 5.79226 13.7242 5.19579C13.7242 4.59931 14.2077 4.1158 14.8042 4.1158C15.4007 4.1158 15.8842 4.59931 15.8842 5.19579Z"
                                                    fill="black" />
                                            </svg>
                                        </li>
                                        <li class="share-item">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.7892 6.69789C18.9297 7.6815 19 8.65105 19 9.60656V10.9555L18.7892 13.8642C18.6768 14.6792 18.4379 15.2693 18.0726 15.6347C17.6792 16.0281 17.089 16.281 16.3021 16.3934C15.5433 16.4496 14.63 16.4918 13.5621 16.5199C12.5222 16.548 11.6651 16.5621 10.9906 16.5621H9.97892C6.85948 16.534 4.82201 16.4778 3.86651 16.3934C3.86651 16.3934 3.7541 16.3794 3.52927 16.3513C3.30445 16.3232 3.12178 16.2951 2.98126 16.267C2.84075 16.2389 2.65808 16.1686 2.43326 16.0562C2.23653 15.9438 2.05386 15.8033 1.88525 15.6347C1.74473 15.466 1.60422 15.2412 1.4637 14.9602C1.35129 14.6511 1.28103 14.3841 1.25293 14.1593L1.16862 13.8642C1.05621 12.8806 1 11.911 1 10.9555V9.60656L1.16862 6.69789C1.28103 5.8829 1.51991 5.29274 1.88525 4.9274C2.27869 4.50585 2.8829 4.25293 3.69789 4.16862C4.45667 4.11241 5.35597 4.07026 6.39578 4.04215C7.4356 4.01405 8.29274 4 8.96721 4H9.97892C12.5082 4 14.6159 4.05621 16.3021 4.16862C17.089 4.25293 17.6792 4.50585 18.0726 4.9274C18.185 5.03981 18.2834 5.18033 18.3677 5.34895C18.452 5.48946 18.5222 5.64403 18.5785 5.81265C18.6347 5.95316 18.6768 6.09368 18.7049 6.23419C18.733 6.37471 18.7611 6.48712 18.7892 6.57143V6.69789ZM12.4239 10.4075L13.0141 10.1124L8.16628 7.58314V12.6417L12.4239 10.4075Z"
                                                    fill="black" />
                                            </svg>
                                        </li>
                                        <li class="share-item">
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.5312 7.375C14.5312 3.36133 11.2793 0.109375 7.26562 0.109375C3.25195 0.109375 0 3.36133 0 7.375C0 10.4805 1.9043 13.0879 4.59961 14.1426C4.54102 13.5859 4.48242 12.707 4.62891 12.0625C4.77539 11.5059 5.47852 8.45898 5.47852 8.45898C5.47852 8.45898 5.27344 8.01953 5.27344 7.375C5.27344 6.37891 5.85938 5.61719 6.5918 5.61719C7.20703 5.61719 7.5 6.08594 7.5 6.64258C7.5 7.25781 7.08984 8.19531 6.88477 9.07422C6.73828 9.77734 7.26562 10.3633 7.96875 10.3633C9.25781 10.3633 10.2539 9.01562 10.2539 7.05273C10.2539 5.29492 8.99414 4.09375 7.23633 4.09375C5.15625 4.09375 3.95508 5.64648 3.95508 7.22852C3.95508 7.87305 4.18945 8.54688 4.48242 8.89844C4.54102 8.95703 4.54102 9.04492 4.54102 9.10352C4.48242 9.33789 4.33594 9.83594 4.33594 9.92383C4.30664 10.0703 4.21875 10.0996 4.07227 10.041C3.16406 9.60156 2.60742 8.2832 2.60742 7.19922C2.60742 4.91406 4.27734 2.80469 7.41211 2.80469C9.93164 2.80469 11.8945 4.62109 11.8945 7.02344C11.8945 9.51367 10.3125 11.5352 8.11523 11.5352C7.38281 11.5352 6.67969 11.1543 6.44531 10.6855C6.44531 10.6855 6.09375 12.0918 6.00586 12.4141C5.83008 13.0586 5.39062 13.8496 5.09766 14.3184C5.77148 14.5527 6.50391 14.6406 7.26562 14.6406C11.2793 14.6406 14.5312 11.3887 14.5312 7.375Z"
                                                    fill="black" />
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- product tab start -->
        <div class="product-tab-section mt-100" data-aos="fade-up" data-aos-duration="700">
            <div class="container">
                <div class="tab-list product-tab-list">
                    <nav class="nav product-tab-nav">
                        <a class="product-tab-link tab-link active" href="#pdescription"
                            data-bs-toggle="tab">Description</a>
                        <a class="product-tab-link tab-link" href="#pshipping" data-bs-toggle="tab">Shipping &
                            Returns</a>
                    </nav>
                </div>
                <div class="tab-content product-tab-content">
                    <div id="pdescription" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-12">
                                <div class="desc-content">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-12">
                                <div class="desc-img">
                                    <img src="{{ asset($product->thumbnail) }}" alt="img">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="pshipping" class="tab-pane fade">
                        <div class="desc-content">
                            <h4 class="heading_18 mb-3">Returns within the European Union</h4>
                            <p class="text_16 mb-4">The European law states that when an order is being returned, it is
                                mandatory for the company to refund the product price and shipping costs charged for the
                                original shipment. Meaning: one shipping fee is paid by us.</p>
                            <p class="text_16 mb-4">Standard Shipping: If you placed an order using "standard shipping" and
                                you want to return it, you will be refunded the product price and initial shipping costs.
                                However, the return shipping costs will be paid by you.</p>
                            <p class="text_16">Free Shipping: If you placed an order using "free shipping" and you want to
                                return it, you will be refunded the product price, but since we paid for the initial
                                shipping, you will pay for the return.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product tab end -->

        <!-- you may also like start -->
        <div class="featured-collection-section mt-100 home-section overflow-hidden">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-heading">You may also like</h2>
                </div>

                <div class="product-container position-relative">
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
                        @foreach ($randomProducts as $randomProduct)
                            <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a class="hover-switch"
                                            href="{{ route('single.product', $randomProduct->slug) }}">
                                            <img class="secondary-img" src="{{ asset($randomProduct->thumbnail) }}"
                                                alt="product-img">
                                            <img class="primary-img" src="{{ asset($randomProduct->thumbnail) }}"
                                                alt="product-img">
                                        </a>

                                        <div class="product-card-action product-card-action-2">
                                            <a href="{{ route('single.product', $randomProduct->slug) }}"
                                                class="addtocart-btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                    <div class="product-card-details text-center">
                                        <h3 class="product-card-title"><a
                                                href="{{ route('single.product', $randomProduct->slug) }}">{{ $randomProduct->name }}</a>
                                        </h3>
                                        <div class="product-card-price">
                                            <span
                                                class="card-price-regular {{ $randomProduct->discount ? 'text-decoration-line-through' : '' }}">&#2547;
                                                {{ $randomProduct->price }}</span>
                                            @if ($randomProduct->discount)
                                                <span class="card-price-compare">&#2547;
                                                    {{ $randomProduct->discount_price }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                </div>
            </div>
        </div>
        <!-- you may also lik end -->
    </main>
@endsection

@section('front_script')
    <script>
        $(document).ready(function() {
            // Change event listener for color selection
            $('#color_id').change(function() {
                var color_id = $(this).val();
                var product_id = "{{ $product->id }}";
                // Ajax request to get sizes based on selected color
                $.ajax({
                    url: '/get-sizes-by-color',
                    method: 'POST',
                    data: {
                        'color_id': color_id,
                        'product_id': product_id
                    },
                    success: function(data) {
                        $('#size_id').html(data);
                        $('#stock_quantity').html('');
                        $('#error_msg').html('');
                        $('.qty-input').val('0');
                    }
                });
            });
            // ajax  select color and  size show quantity ---
            $('#size_id').change(function() {
                var color_id = $('#color_id').val();
                var size_id = $(this).val();
                var product_id = "{{ $product->id }}";
                if (size_id) {
                    $.ajax({
                        type: "POST",
                        url: '/get-quantity',
                        data: {
                            'color_id': color_id,
                            'size_id': size_id,
                            'product_id': product_id
                        },
                        success: function(data) {
                            $('#stock_quantity').html(data);
                            $('#error_msg').html('');
                            $('.qty-input').val('0');
                        }
                    });
                } else {
                    $('#stock_quantity').html('');
                }
            });
            //---increment and decrement button count---
            $('.inc-qty').click(function(e) {
                e.preventDefault();
                var quntity = $('.qty-input').val();
                var value = parseInt(quntity, 10);
                var total_stocks_quantity = parseInt($('#stock_quantity').html());
                var color_id = $('#color_id').val();
                var size_id = $('#size_id').val();
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    if (color_id && size_id) {
                        if (value < total_stocks_quantity) {
                            value++;
                            $('.qty-input').val(value);
                            $('#error_msg').html('');
                        } else {
                            $('#error_msg').html('Stock Not Available');
                        }
                    } else {
                        $('#error_msg').html('Select Color & Size.');
                    }


                }
            });

            $('.dec-qty').click(function(e) {
                e.preventDefault();
                var quntity = $('.qty-input').val();
                var value = parseInt(quntity, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $('.qty-input').val(value);
                    $('#error_msg').html('')
                }
            });


        });
    </script>
@endsection
