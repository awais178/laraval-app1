@if (count($sliders) > 0)
    @php
        $sliders->loadMissing('metadata');
        $slick = [
            'autoplay'       => ($shortcode->is_autoplay ?: 'yes') == 'yes',
            'infinite'       => ($shortcode->is_autoplay ?: 'yes') == 'yes',
            'autoplaySpeed'  => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 5000,
            'speed'          => 1000,
            'slidesToShow'   => 1,
            'slidesToScroll' => 1,
            'appendArrows'   => '.arrows-wrapper',
             'appendDots'     => '.dots-wrapper',
            'fade'           => true,
        ];
    @endphp
    {{--        <div class="section-content section-content__slider lazyload"--}}
    {{--             @if ($shortcode->background) data-bg="{{ RvMedia::getImageUrl($shortcode->background) }}" @endif>--}}
    {{--            <div class="container-xxxl">--}}
    {{--                <div class="row gx-0 gx-md-4">--}}
    {{--                    <div class="col-md-4">--}}
    {{--                        <div class="section-banner-wrapper my-3">--}}
    {{--                            <div class="banner-medium">--}}
    {{--                                <div class="banner-item__image">--}}
    {{--                                    {!! display_ads_advanced($shortcode->ads) !!}--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="@if (is_plugin_active('ads') && $shortcode->ads) col-md-8 @else col-md-12 @endif">--}}
    {{--                        <div class="section-slides-wrapper my-3">--}}
    {{--                            <div class="slide-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">--}}
    {{--                                @foreach($sliders as $slider)--}}
    {{--                                    <div class="slide-item">--}}
    {{--                                        <div class="slide-item__image">--}}
    {{--                                            @if ($slider->link)--}}
    {{--                                                <a href="{{ url($slider->link) }}"> @endif--}}
    {{--                                                    @php--}}
    {{--                                                        $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;--}}
    {{--                                                        $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;--}}
    {{--                                                    @endphp--}}
    {{--                                                    <picture>--}}
    {{--                                                        <source--}}
    {{--                                                            srcset="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"--}}
    {{--                                                            media="(min-width: 1200px)"/>--}}
    {{--                                                        <source--}}
    {{--                                                            srcset="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"--}}
    {{--                                                            media="(min-width: 768px)"/>--}}
    {{--                                                        <source--}}
    {{--                                                            srcset="{{ RvMedia::getImageUrl($mobileImage, null, false, RvMedia::getDefaultImage()) }}"--}}
    {{--                                                            media="(max-width: 767px)"/>--}}
    {{--                                                        <img src="{{ image_placeholder($slider->image) }}"--}}
    {{--                                                             alt="{{ $slider->title }}"/>--}}
    {{--                                                    </picture>--}}
    {{--                                                    @if ($slider->link) </a>--}}
    {{--                                            @endif--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                @endforeach--}}
    {{--                            </div>--}}
    {{--                            <div class="arrows-wrapper"></div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    @if (is_plugin_active('ads') && $shortcode->ads)--}}

    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <div class="section-content section-content__slider lazyload"
         @if ($shortcode->background) data-bg="{{ RvMedia::getImageUrl($shortcode->background) }}" @endif>
        <div class="container-xxxl">
            <div class="row gx-0 gx-md-4">

                <div class="@if (is_plugin_active('ads') && $shortcode->ads) col-12 @else col-md-12 @endif">
                    <div class="section-slides-wrapper my-3">
                        <div class="slide-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">
                            @foreach($sliders as $slider)
                                <div class="slide-item">
                                    <div class="slide-item__image">
                                        @if ($slider->link)
                                            <a href="{{ url($slider->link) }}"> @endif
                                                @php
                                                    $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                                                    $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                                                @endphp
                                                <picture>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 1200px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 768px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($mobileImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(max-width: 767px)"/>
                                                    <img src="{{ image_placeholder($slider->image) }}"
                                                         alt="{{ $slider->title }}"/>
                                                </picture>
                                                @if ($slider->link) </a>
                                        @endif

                                    </div>

                                    <div class="slider-content">
                                        <h3 class="text-white">Mobile Phones</h3>
                                        <a href="{{$slider->link}}" class="btn btn-warning">Shop Now</a>
                                    </div>


                                </div>

                            @endforeach
                        </div>
                        {{--                        <div class="arrows-wrapper"></div>--}}

                        <div class="dots-wrapper"></div>

                    </div>
                </div>

                <div class="@if (is_plugin_active('ads') && $shortcode->ads) col-md-6 @else col-md-12 @endif">
                    <div class="section-slides-wrapper my-3">
                        <div class="slide-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">
                            @foreach($sliders as $slider)
                                <div class="slide-item">
                                    <div class="slide-item__image">
                                        @if ($slider->link)
                                            <a href="{{ url($slider->link) }}"> @endif
                                                @php
                                                    $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                                                    $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                                                @endphp
                                                <picture>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 1200px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 768px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($mobileImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(max-width: 767px)"/>
                                                    <img src="{{ image_placeholder($slider->image) }}"
                                                         alt="{{ $slider->title }}"/>
                                                </picture>
                                                @if ($slider->link) </a>
                                        @endif





                                        <div

                                            class="catagory-text-box d-flex flex-column justify-content-center align-items-center">
                                            <div class="catagory-text-name">

                                                    <div class="">
                                                        <a href="">
                                                        <h3 class="p-0 m-0">Head Phone</h3>

                                                        </a>

                                                        <p class="text-white p-0 m-0"> Premium Collection</p>
                                                    </div>




                                            </div>
                                        </div>



                                    </div>


                                </div>

                            @endforeach
                        </div>
                        {{--                        <div class="arrows-wrapper"></div>--}}
                    </div>
                </div>

                <div class="@if (is_plugin_active('ads') && $shortcode->ads) col-md-6 @else col-md-12 @endif">
                    <div class="section-slides-wrapper my-3">
                        <div class="slide-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">
                            @foreach($sliders as $slider)
                                <div class="slide-item">
                                    <div class="slide-item__image">
                                        @if ($slider->link)
                                            <a href="{{ url($slider->link) }}"> @endif
                                                @php
                                                    $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                                                    $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                                                @endphp
                                                <picture>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 1200px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(min-width: 768px)"/>
                                                    <source
                                                        srcset="{{ RvMedia::getImageUrl($mobileImage, null, false, RvMedia::getDefaultImage()) }}"
                                                        media="(max-width: 767px)"/>
                                                    <img src="{{ image_placeholder($slider->image) }}"
                                                         alt="{{ $slider->title }}"/>
                                                </picture>
                                                @if ($slider->link) </a>
                                        @endif






                                            <div
                                                class="catagory-text-box d-flex flex-column justify-content-center align-items-center">
                                                <div class="catagory-text-name">

                                                    <div class="">
                                                        <a href="">
                                                        <h3 class="p-0 m-0">Smart Watches</h3>

                                                        </a>

                                                        <p class="text-white p-0 m-0"> Premium Collection</p>
                                                    </div>


                                                </div>
                                            </div>


                                    </div>


                                </div>
                            @endforeach
                        </div>
                        {{--                        <div class="arrows-wrapper"></div>--}}
                    </div>
                </div>
                {{--                <div class="col-md-6">--}}
                {{--                    <div class="section-banner-wrapper my-3">--}}
                {{--                        <div class="banner-medium">--}}
                {{--                            <div class="banner-item__image">--}}
                {{--                                @if (is_plugin_active('ads') && $shortcode->ads)--}}
                {{--                                    {!! display_ads_advanced($shortcode->ads) !!}--}}
                {{--                                @endif--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            </div>
        </div>
    </div>

@endif
