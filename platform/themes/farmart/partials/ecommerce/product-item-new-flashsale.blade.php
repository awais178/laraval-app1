{{--<h1>flash sale </h1>--}}
<div class="product-thumbnail flash-sale-product">
    <a class="product-loop__link img-fluid-eq" href="{{ $product->url }}" tabindex="0">
        <div class="img-fluid-eq__dummy"></div>
        <div class="img-fluid-eq__wrap">
            <img class="lazyload product-thumbnail__img"
                 src="{{ image_placeholder($product->image, 'small') }}"
                 data-src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}"
                 alt="{{ $product->name }}">
        </div>
        <span class="ribbons">
            @if ($product->isOutOfStock())
                <span class="ribbon out-stock">{{ __('Out Of Stock') }}</span>
            @else
                @if ($product->productLabels->count())
                    @foreach ($product->productLabels as $label)
                        <span class="ribbon"
                              @if ($label->color) style="background-color: {{ $label->color }}" @endif>{{ $label->name }}</span>
                    @endforeach
                @else
                    @if ($product->front_sale_price !== $product->price)
                        <div class="featured ribbon"
                             dir="ltr">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                    @endif @if ($product->front_sale_price !== $product->price)
                        <div class="featured ribbon"
                             dir="ltr">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                    @endif @if ($product->front_sale_price !== $product->price)
                        <div class="featured ribbon"
                             dir="ltr">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                    @endif
                @endif
            @endif
        </span>
    </a>
    {!! Theme::partial('ecommerce.product-loop-buttons', compact('product') + (!empty($wishlistIds) ? compact('wishlistIds') : [])) !!}
</div>
<div class="product-details product-details-flash-sale position-relative">
    <div class="product-content-box product-content-box-flash-sale">
        @if (is_plugin_active('marketplace') && $product->store->id)
            <div class="sold-by-meta">
                <a href="{{ $product->store->url }}" tabindex="0">{{ $product->store->name }}</a>
            </div>
        @endif
        <div class="">
            <h3 class="product__title text-center">
                <a href="{{ $product->url }}" class="" tabindex="0"><h6>{!! BaseHelper::clean($product->name) !!}</h6></a>
            </h3>
        </div>

        {{--        @if (EcommerceHelper::isReviewEnabled())--}}
        {{--            {!! Theme::partial('star-rating', ['avg' => $product->reviews_avg, 'count' => $product->reviews_count]) !!}--}}
        {{--        @endif--}}
        <h1 class="text-danger">{!! Theme::partial('ecommerce.product-price', compact('product')) !!}</h1>
{{--            <h6 class="text-white">$111</h6>--}}

        @if (!empty($isFlashSale))
            <div class="deal-sold row mt-2">
                <div class="deal-text col-auto text-dark">
                    <span class="sold fw-bold">
                        @if ($product->pivot->quantity > $product->pivot->sold)
                            <span class="text">{{ __('Sold') }}: Sold</span>
                            <span
                                class="value">{{ (int) $product->pivot->sold }} / {{ (int) $product->pivot->quantity }}</span>
                        @else
                            <span class="text text-danger">{{ __('Sold out') }}</span>
                        @endif
                    </span>
                </div>


                    <div class="deal-progress col d-flex justify-content-center align-items-center" >
                        <div class="progress" style="width: 98%">
                            <div class="progress-bar"
                                 role="progressbar"
                                 aria-valuenow="{{ $product->pivot->quantity > 0 ? ($product->pivot->sold / $product->pivot->quantity) * 100 : 0 }}"
                                 aria-valuemin="0"
                                 aria-valuemax="100"
                                 style="width: {{ $product->pivot->quantity > 0 ? ($product->pivot->sold / $product->pivot->quantity) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>


            </div>
        @endisset
    </div>
{{--    <div class="product-bottom-box">--}}
{{--        {!! Theme::partial('ecommerce.product-cart-form', compact('product')) !!}--}}
{{--    </div>--}}
</div>
