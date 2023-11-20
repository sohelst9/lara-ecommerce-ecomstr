<div class="slideshow-section position-relative">
    <div class="slideshow-active activate-slider"
        data-slick='{
            "slidesToShow": 1, 
            "slidesToScroll": 1, 
            "dots": true,
            "arrows": true,
            "responsive": [
                {
                "breakpoint": 768,
                "settings": {
                    "arrows": false
                }
                }
            ]
        }'>
        @foreach ($banners as $banner)
            <div class="slide-item slide-item-bag position-relative">
                <img class="slide-img d-none d-md-block" src="{{ asset($banner->image) }}"
                    alt="slide-1">
                <img class="slide-img d-md-none" src="{{ asset($banner->image) }}"
                    alt="slide-1">
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center">
                        <div class="content-box slide-content py-4">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                {{ $banner->title }}
                            </h2>
                            <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                {{ $banner->sub_title }}
                            </p>
                            <a class="btn-primary slide-btn animate__animated animate__fadeInUp" href="{{ route('single.product', $banner->slug) }}"
                                data-animation="animate__animated animate__fadeInUp">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="activate-arrows"></div>
    <div class="activate-dots dot-tools"></div>
</div>
