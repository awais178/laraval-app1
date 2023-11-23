@php
    $products->loadMissing(['defaultVariation',  'options', 'options.values']);
@endphp
<div class="loading loading-container">
    <div class="half-circle-spinner">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>
<!--products list-->
<input type="hidden" name="page" data-value="{{ $products->currentPage() }}">
<input type="hidden" name="q" value="{{ BaseHelper::stringify(request()->query('q')) }}">
<div class="row @if (request()->input('layout') == 'list') row-cols-1 shop-products-listing__list @else row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 @endif shop-products-listing g-0">
    @forelse ($products as $product)
        <div class="col">
            <div class="product-inner">
                {!! Theme::partial('ecommerce.product-item', compact('product')) !!}
            </div>
        </div>
    @empty
    <div style="display: flex; width:100vw; justify-content: center; align-items: center; height: 100vh; text-align: center;">
        <div style="width:100vw; margin: auto;">
            <img class="unique-image" src="http://localhost/cellphone-website-ff/public/storage/general/5681806-200.png" alt="Unique Image" style="max-width: 100%;">
            <h1 class="unique-heading" style="color: black; font-size:1.3rem">Ooops, Sorry!</h1>
            <h3 class="unique-subheading" style="color: black; font-size:0.7rem">The unique product you are looking for is currently unavailable or try to search using other unique keywords</h3>
        </div>
    </div>
    
    @endforelse

<div class="row mt-2 mb-3">
    {!! $products->withQueryString()->links(Theme::getThemeNamespace('partials.pagination-numeric')) !!}
</div>
