{{--<h1>Lorem ipsum dolor sit amet.</h1>--}}
<div class="widget-products-with-category py-5 bg-light">
    <div class="container-xxxl">
        <div class="row">

                <div class="row align-items-center mb-2 widget-header">
                    <h2 class="col-auto mb-0 py-2">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                </div>

            <div class="col-md-6">
                        <featured-products-component
                            url="{{ route('public.ajax.featured-products-new') }}"
                            {{--                    url="{{ route('public.ajax.featured-products') }}"--}}
                            limit="{{ $shortcode->limit }}" slick_config="{{ json_encode([
                    'rtl' => BaseHelper::siteLanguageDirection() == 'rtl',
                    'appendArrows' => '.arrows-wrapper',
                    'arrows' => true,
                    'dots' => false,
                    'autoplay' => $shortcode->is_autoplay == 'yes',
                    'infinite' => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
                    'autoplaySpeed' => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 3000,
                    'speed' => 800,
                    'slidesToShow' => 1,
                    'slidesToScroll' => 1,
                    'swipeToSlide' => true,
                    'responsive' => [
                        [
                            'breakpoint' => 1400,
                            'settings' => [
                                'slidesToShow' => 1,
                            ],
                        ],
                    [
                        'breakpoint' => 1199,
                        'settings' => [
                            'slidesToShow' => 1,
                        ],
                    ],
                    [
                        'breakpoint' => 1024,
                        'settings' => [
                            'slidesToShow' => 1,
                        ],
                    ],
                    [
                        'breakpoint' => 767,
                        'settings' => [
                            'arrows' => true,
                            'dots' => false,
                            'slidesToShow' => 1,
                            'slidesToScroll' => 1,
                        ],
                    ],
                ],
            ]) }}">

                        </featured-products-component>

                    </div>

<?php
            $products = get_featured_products([
                    'take' => 2,
                    'with' => [
                        'slugable',
                        'variations',
                        'productCollections',
                        'variationAttributeSwatchesForProductList',
                    ],
                ] + EcommerceHelper::withReviewsParams());

?>

            <div class="col-md-6 ">
                <div class="row">
                    @if($products)
                        @foreach($products as $product)
                            <a class="product-loop__link img-fluid-eq" href="{{ $product->url }}" tabindex="0">
                    <div class="col-lg-12 col-md-12" style="width: 100%;">
                        <div class="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card" style="border-radius: 17px;margin-bottom: 18px">
                                        <div class="card-horizontal" style="display: flex;flex: 1 1 auto;">
                                            <div class="img-square-wrapper" style="width: 45%">
                                                <img class="lazyload h-100 fluid"
                                                     src="{{ image_placeholder($product->image, 'small') }}"
                                                     data-src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                                     alt="{{ $product->name }}"
                                                     style="border-radius: 15px 0px 0px 15px"
                                                >
                                            </div>
                                            <div class="card-body p-0 d-flex justify-content-center align-items-center">
                                                <div class="">
                                                    <div class="bg-warning text-dark">
                                                        {{--<p class="text-center"--}}
                                                           {{--style="font-weight: bolder;padding: 3px;--}}

                                                           {{--">Limited Offer</p>--}}
                                                    </div>
                                                    <h4 class="card-title">{{$product->name}}</h4>
                                                    <h5 class="card-text">{{$product->price}}</h5>
                                                </div>


                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>




        </div>
    </div>
</div>
