@php
    $slick = [
        'rtl'            => BaseHelper::siteLanguageDirection() == 'rtl',
        'appendArrows'   => '.arrows-wrapper',
        'arrows'         => true,
        'dots'           => false,
        'autoplay'       => $shortcode->is_autoplay == 'yes',
        'infinite'       => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
        'autoplaySpeed'  => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 3000,
        'speed'          => 800,
        'slidesToShow'   => 5,
        'slidesToScroll' => 1,
        'responsive'     => [
            [
                'breakpoint' => 1700,
                'settings'   => [
                    'slidesToShow' => 5,
                ],
            ],
            [
                'breakpoint' => 1500,
                'settings'   => [
                    'slidesToShow' => 5,
                ],
            ],
            [
                'breakpoint' => 1199,
                'settings'   => [
                    'slidesToShow' => 4,
                ],
            ],
            [
                'breakpoint' => 1024,
                'settings'   => [
                    'slidesToShow' => 3,
                ],
            ],
            [
                'breakpoint' => 767,
                'settings'   => [
                    'arrows'         => false,
                    'dots'           => true,
                    'slidesToShow'   => 2,
                    'slidesToScroll' => 2,
                ],
            ],
        ],
    ];

    $categories = get_featured_product_categories();
@endphp
@if ($categories->count())
    <div class="widget-product-categories pt-5 pb-2">
        <div class="container-xxxl">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mb-2 widget-header">
                        <h2 class="col-auto mb-0 py-2">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    </div>
                    <div class="product-categories-body pb-4 arrows-top-right">
                        <div data-slick="{{ json_encode($slick) }}"
                             class="product-categories-box slick-slides-carousel slick-slides-carousel-2">
                            @foreach ($categories as $item)
                                <div class="product-category-item">
                                    <div class="category-item-body category-item-body-2 mx-3">
                                        <a class="d-block" href="{{ $item->url }}">
                                            <div class="d-flex justify-content-center align-items-center">


                                                <div class="category__thumb img-fluid-eq">
                                                    <div class="img-fluid-eq__dummy"></div>
                                                    <div
                                                        class="img-fluid-eq__wrap-catagory d-flex justify-content-center align-items-center">
                                                        <img
                                                            class="lazyload mx-auto"
                                                            style="height: 60px;width: 50px"
                                                            data-src="{{ RvMedia::getImageUrl($item->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                                            alt="{{ $item->name }}"/>
                                                    </div>
                                                </div>
                                                <div class="category__text text-center py-3 px-3">
                                                    <h6 class="category__name">{{ $item->name }}</h6>
{{--                                                    <h1>Lorem ipsum dolor sit amet.</h1>--}}
                                                </div>


                                            </div>

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

    {{--    Catagories images    --}}

    {{--    <div class="">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-12">--}}
    {{--                <div class="col-md-3">--}}
    {{--                    <div class="catagory-single-img">--}}
    {{--                        <div class="image-container d-flex">--}}
    {{--                            <img src="https://images.unsplash.com/photo-1605701250441-2bfa95839417?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80" alt="Image">--}}
    {{--                            <div class="content">--}}
    {{--                                <h2>Hover Title</h2>--}}
    {{--                                <p>Hover Content</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--            <div class="col-12">--}}
    {{--                <div class="col-md-3">--}}
    {{--                    <div class="catagory-single-img">--}}
    {{--                        <div class="image-container d-flex">--}}
    {{--                            <img src="https://images.unsplash.com/photo-1605701250441-2bfa95839417?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80" alt="Image">--}}
    {{--                            <div class="content">--}}
    {{--                                <h5>Hover Title</h5>--}}
    {{--                                <p>300 DHS</p>--}}
    {{--                                <a>View Details</a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}



    <div class=" d-flex justify-content-center align-items-center">
        <a href="/products" class="btn btn-warning btn-lg show-all-cat-btn mb-2"> <strong>View all</strong></a>
    </div>
@endif
