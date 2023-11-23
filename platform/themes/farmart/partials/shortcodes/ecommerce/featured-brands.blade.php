@php
    $slick = [
        'rtl'            => BaseHelper::siteLanguageDirection() == 'rtl',
        'appendArrows'   => '.arrows-wrapper',
        'arrows'         => true,
        'dots'           => false,
        'autoplay'       => $shortcode->is_autoplay == 'yes',
        'infinite'        => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
        'autoplaySpeed'  => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 3000,
        'speed'          => 800,
        'slidesToShow'   => 4,
        'slidesToScroll' => 1,
        'responsive'     => [
            [
                'breakpoint' => 1024,
                'settings'   => [
                    'slidesToShow' => 5,
                ],
            ],
            [
                'breakpoint' => 767,
                'settings'   => [
                    'arrows'         => false,
                    'dots'           => true,
                    'slidesToShow'   => 3,
                    'slidesToScroll' => 1,
                ],
            ],
        ],
    ];
    $brands = get_featured_brands();
@endphp
<div class="widget-featured-brands pt-3">
    <div class="container-xxxl">
        <div class="row">
            <div class="col-12">
                <div class="row align-items-center mb-2 widget-header">
                    <h2 class="col-auto mb-0 py-2" style="text-align: center; margin:auto;">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                </div>
                <div class="featured-brands__body arrows-top-right">
                    <div class="featured-brands-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">
                        @foreach ($brands as $brand)
                            <div class="featured-brand-item">
                                <div class="brand-item-body mx-2 pt-2 px-2">
                                    <a class="py-3" href="{{ $brand->url }}">
                                        <div class="brand__thumb brand__thumb-2  mb-3 img-fluid-eq">
                                            <div class="img-fluid-eq__dummy"></div>
                                            <div class="img-fluid-eq__wrap img-fluid-eq__wrap-2">
                                                <img
                                                    class="lazyload mx-auto"
                                                    src="{{ image_placeholder($brand->logo) }}"
                                                    data-src="{{ RvMedia::getImageUrl($brand->logo, null, false, RvMedia::getDefaultImage()) }}"
                                                    alt="{{ $brand->name }}"
                                                />
                                            </div>
                                        </div>
                                        {{--                                        <div class="brand__text py-3">--}}
                                        {{--                                            <h4 class="h6 fw-bold text-secondary text-uppercase brand__name">--}}
                                        {{--                                                {{ $brand->name }}--}}
                                        {{--                                            </h4>--}}
                                        {{--                                            <div class="h5 fw-bold brand__desc">--}}
                                        {{--                                                <div>--}}
                                        {{--                                                    {!! BaseHelper::clean(Str::limit($brand->description, 150)) !!}--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="arrows-wrapper"></div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Join Our Email sections --}}

<div class="container my-5">
    <div class="row email-section">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="">
                <h1>Join our newsletter now!</h1>
                <p>Register now and get our latest updates and promos.</p>
                <input type="email" placeholder="Enter your Email" class="form-control inputofemailsection">
                <button class="btn btn-dark infoemailbtn"><strong>Join</strong></button>

            </div>

        </div>
        <div class="col-md-6">
            <div class="img-fluid">
                <img src="https://i.postimg.cc/1XxxNtd6/445566.png" class="img-fluid" alt="">


            </div>
        </div>
    </div>
</div>
