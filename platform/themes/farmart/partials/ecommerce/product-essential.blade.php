
<div class="product-thumbnail product-essential-thumbnail" style="border-radius: 0px !important;">
{{--    <h1>Lorem ipsum dolor sit.</h1>--}}
    <a class="product-loop__link img-fluid-eq" href="{{ $product->url }}" tabindex="0">
        <div class="img-fluid-eq__dummy"></div>
        <div class="img-fluid-eq__wrap">
            <img class="lazyload product-thumbnail__img essential-product-img"
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
                        <span class="ribbon" @if ($label->color) style="background-color: {{ $label->color }}" @endif>{{ $label->name }}</span>
                    @endforeach
                @else
                    @if ($product->front_sale_price !== $product->price)
                        <div class="featured ribbon" dir="ltr">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                    @endif @if ($product->front_sale_price !== $product->price)
                        <div class="featured ribbon" dir="ltr">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                    @endif @if ($product->front_sale_price !== $product->price)
                        <div class="featured ribbon" dir="ltr">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
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

            {!! Theme::partial('star-rating', ['avg' => $product->reviews_avg, 'count' => $product->reviews_count]) !!}

            </div>
            @endif
        @if (!empty($isFlashSale))
            <div class="deal-sold row mt-2">
                <div class="deal-text col-auto">
                    <span class="sold fw-bold">
                        @if ($product->pivot->quantity > $product->pivot->sold)
                            <span class="text">{{ __('Sold') }}: Sold</span>
                            <span class="value">{{ (int) $product->pivot->sold }} / {{ (int) $product->pivot->quantity }}</span>
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

    <form class="cart-form" action="{{ route('public.cart.add-to-cart') }}" method="POST">
        @csrf
        @if (!empty($withVariations) && $product->variations()->count() > 0)
            <div class="pr_switch_wrap">
                {!! render_product_swatches($product, [
                    'selected' => $selectedAttrs,
                    'view'     => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                ]) !!}
            </div>
            <div class="number-items-available" style="display: none; margin-bottom: 10px;"></div>
        @endif

        {!! render_product_options($product) !!}

        <input type="hidden"
               name="id" class="hidden-product-id"
               value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>

        @if (EcommerceHelper::isCartEnabled() || !empty($withButtons))
            {!! apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product) !!}
            <div class="product-button d-flex justify-content-center align-items-center">
                @if (EcommerceHelper::isCartEnabled())
{{--                    {!! Theme::partial('ecommerce.product-quantity', compact('product')) !!}--}}
                    <button type="submit" name="add_to_cart" value="1" class="btn btn-primary mb-2 mt-2 add-to-cart-button @if ($product->isOutOfStock()) disabled @endif" @if ($product->isOutOfStock()) disabled @endif title="{{ __('Add to cart') }}" style="width: auto !important; background-color: #FCD927 !important;">
{{--                    <span class="svg-icon">--}}
{{--                        <svg>--}}
{{--                            <use href="#svg-icon-cart" xlink:href="#svg-icon-cart"></use>--}}
{{--                        </svg>--}}
{{--                    </span>--}}
                        <span class="add-to-cart-text ms-2">{{ __('Add to cart') }}</span>
                    </button>

                    @if (EcommerceHelper::isQuickBuyButtonEnabled() && isset($withBuyNow) && $withBuyNow)
                        <button type="submit" name="checkout" value="1" class="btn btn-primary btn-black mb-2 add-to-cart-button @if ($product->isOutOfStock()) disabled @endif" @if ($product->isOutOfStock()) disabled @endif title="{{ __('Buy Now') }}">
                            <span class="add-to-cart-text ms-2">{{ __('Buy Now') }}</span>
                        </button>
                    @endif
                @endif
                @if (!empty($withButtons))
                    {!! Theme::partial('ecommerce.product-loop-buttons', compact('product', 'wishlistIds')) !!}
                @endif
            </div>
        @endif
    </form>


    {{--    <div class="product-bottom-box">--}}
{{--        {!! Theme::partial('ecommerce.product-cart-form', compact('product')) !!}--}}
{{--    </div>--}}
</div>
