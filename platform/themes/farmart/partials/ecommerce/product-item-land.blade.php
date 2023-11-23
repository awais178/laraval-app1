<div class="product-thumbnail new-arrival-product">
{{--    *****************************************************************--}}
{{--    <h1>ye new arrival product hain </h1>--}}
{{--    ******************************************************************--}}
    <a class="product-loop__link img-fluid-eq" href="{{ $product->url }}" tabindex="0">
        <div class="img-fluid-eq__dummy"></div>
        <div class="img-fluid-eq__wrap">
            <img class="lazyload product-thumbnail__img"
                 style="border-radius: 30px"
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
<div class="product-details position-relative">
    <div class="product-content-box">
        @if (is_plugin_active('marketplace') && $product->store->id)
            <div class="sold-by-meta">
                <a href="{{ $product->store->url }}" tabindex="0">{{ $product->store->name }}</a>
            </div>
        @endif
        <h3 class="product__title text-center">
            <a href="{{ $product->url }}" tabindex="0">{!! BaseHelper::clean($product->name) !!}</a>
        </h3>
        {!! Theme::partial('ecommerce.product-price', compact('product')) !!}
        @if (EcommerceHelper::isReviewEnabled())
            <div class="d-flex justify-content-center align-items-center">
            {{--{!! Theme::partial('star-rating', ['avg' => $product->reviews_avg, 'count' => $product->reviews_count]) !!}--}}
                <div class="d-flex  justify-content-between">

                <div class="d-flex mx-3">
                    <i class="bi bi-star-fill text-warning"></i>

                    <p class="ms-3">{{number_format($product->reviews_avg,1)}}</p>
                </div>

                <div class="mx-3">

                    {{--<p>20 sold</p>--}}

                </div>


            </div>
            </div>
{{--            {!! Theme::partial('star-rating', ['avg' => $product->reviews_avg, 'count' => $product->reviews_count]) !!}--}}

        @endif


                    <div class="product-bottom-box product-bottom-box-new-arrival">
                        {!! Theme::partial('ecommerce.product-cart-form', compact('product')) !!}
                    </div>
        @if (!empty($isFlashSale))
            <div class="deal-sold row mt-2">
                <div class="deal-text col-auto">
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

                <div class="deal-progress col">
                    <div class="progress">
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
