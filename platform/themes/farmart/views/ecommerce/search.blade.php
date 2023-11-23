@php
    Theme::layout('full-width');
    $products->loadMissing('defaultVariation');
@endphp

{!! $widgets = dynamic_sidebar('products_list_sidebar') !!}

@if (empty($widgets))
    {!! Theme::partial('page-header', ['size' => 'xxxl', 'withTitle' => false]) !!}
@endif

<div class="container-xxxl">
    <div class="row">
        
            <div class="categories-container1">
                <h3>All Categories</h3>
                </div>
                <div class="col-xxl-2 col-lg-3">
            <form action="{{ URL::current() }}"
                data-action="{{ route('public.products') }}"
                method="GET"
                id="products-filter-form">
                @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.filters')
            </form>
            
        </div>
        <div class="col-xxl-10 col-lg-9 products-listing position-relative">

            @include(Theme::getThemeNamespace('views.ecommerce.includes.product-items'))    
            </div>
            
            
        </div>
    </div>
</div>
