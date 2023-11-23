
@if ($flashSale)
    <div class="widget-product-deals-day new-flash-sale-section py-5">
        <div class="container-xxxl">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mb-2">
                        <h2 class="col-auto mb-0 py-2">{!! $shortcode->title ? BaseHelper::clean($shortcode->title) : BaseHelper::clean($flashSale->name) !!}</h2>
                        <div class="ps-4 col-auto py-2 d-none d-md-block">
                            <a href="{{ route('public.products') }}">
                                <span class="link-text">{{ __('All Offers') }}
                                    <span class="svg-icon">
                                        <svg>
                                            <use href="#svg-icon-chevron-right"
                                                 xlink:href="#svg-icon-chevron-right"></use>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center align-items-center">

                                <div class="">
                                    <h6>Sale ends in:</h6>
{{--                                    Count Down Wrapper    --}}
                                    <div class="countdown-wrapper col-auto ps-md-5 py-2">
                                        <div class=" row align-items-center justify-content-center gx-2">
                                            <div class="ends-text col-auto">
{{--                                                <div class="d-flex align-items-center justify-content-center">--}}
{{--                                        <span class="svg-icon">--}}
{{--                                            <i class="icon icon-speed-fast"></i>--}}
{{--                                        </span>--}}
{{--                                                    {{ __('Expires in') }}:--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="expire-countdown d-flex justify-content-between"
                                                 data-expire="{{ now()->diffInSeconds($flashSale->end_date) }}">
                                            </div>

                                        </div>
                                    </div>

                                    {{--<div class="new-count-down-wrapper">--}}
                                        {{--<div class="d-flex justify-content-between ">--}}

                                            {{--<div class="new-count-down-wrapper-time">--}}
                                                {{--<h5 class="m-0 p-0 text-warning">21</h5>--}}
                                                {{--<p class="m-0 p-0 text-white">Days</p>--}}
                                            {{--</div>--}}

                                            {{--<div class="new-count-down-wrapper-time">--}}
                                                {{--<h5 class="m-0 p-0 text-warning">22</h5>--}}
                                                {{--<p class="m-0 p-0 text-white">Hrs</p>--}}
                                            {{--</div>--}}

                                            {{--<div class="new-count-down-wrapper-time">--}}
                                                {{--<h5 class="m-0 p-0 text-warning">22</h5>--}}
                                                {{--<p class="m-0 p-0 text-white">Mins</p>--}}
                                            {{--</div>--}}

                                            {{--<div class="new-count-down-wrapper-time">--}}
                                                {{--<h5 class="m-0 p-0 text-warning">22</h5>--}}
                                                {{--<p class="m-0 p-0 text-white">Sec</p>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</div>--}}


                                    <div class="">
                                        <h3>Everyday discount up to 30% off</h3>
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ipsum iusto optio unde.</p>
                                        <a href="{{ route('public.products') }}" class="btn btn-warning text-dark">Shop Now</a>
                                    </div>

                                </div>



                            </div>
                            <div class="col-md-8 mt-4">
                                <flash-sale-products-component url="{{ route('public.ajax.get-flash-sale-new', $flashSale->id) }}"
                                                               slick_config="{{ json_encode([
                        'rtl' => BaseHelper::siteLanguageDirection() == 'rtl',
                        'appendArrows' => '.arrows-wrapper',
                        'arrows' => true,
                        'dots' => false,
                        'autoplay' => $shortcode->is_autoplay == 'yes',
                        'infinite' => $shortcode->infinite == 'yes',
//                        'infinite' => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
                        'autoplaySpeed' => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 3000,
                        'speed' => 800,
                        'slidesToShow' => 4,
                        'slidesToScroll' => 1,
                        'swipeToSlide' => true,
                        'responsive' => [
                            [
                                'breakpoint' => 1400,
                                'settings' => [
                                    'slidesToShow' => 3
                                ]
                            ],
                            [
                                'breakpoint' => 1199,
                                'settings' => [
                                    'slidesToShow' => 3
                                ]
                            ],
                            [
                                'breakpoint' => 1024,
                                'settings' => [
                                    'slidesToShow' => 2
                                ]
                            ],
                            [
                                'breakpoint' => 767,
                                'settings' => [
                                    'arrows' => true,
                                    'dots' => false,
                                    'slidesToShow' => 2,
                                    'slidesToScroll' => 1
                                ],

                            ],

                             [
                                'breakpoint' => 380,
                                'settings' => [
                                    'arrows' => true,
                                    'dots' => false,
                                    'slidesToShow' => 1,
                                    'slidesToScroll' => 1
                                ],

                            ],
                        ],
                    ]) }}">
                                </flash-sale-products-component>



                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
