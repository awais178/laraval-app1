@php
    Theme::layout('full-width');
    $products->loadMissing('defaultVariation');
    $baseURL = env('APP_URL');
@endphp

{!! $widgets = dynamic_sidebar('products_list_sidebar') !!}

@if (empty($widgets))
    {!! Theme::partial('page-header', ['size' => 'xxxl', 'withTitle' => false]) !!}
@endif

<div class="container-xxxl">
    <div class="row my-5">
        <div class="col-12">
            <div class="row catalog-header justify-content-between">
                <div class="col-auto catalog-header__left d-flex align-items-center">
                    
                    <br>
                    
                    
                    <a class="d-lg-none sidebar-filter-mobile" href="#">
                        
                        <span class="svg-icon me-2">
                            <svg>
                                <use href="#svg-icon-filter" xlink:href="#svg-icon-filter"></use>
                            </svg>
                        </span>
                        <span>{{ __('Filter') }}</span>
                    </a>
                </div>
                <div class="col-auto catalog-header__right">
                    
                   
                </div>
            </div>
        </div>
        
    </div>
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
            <div class="categories-container">
                <div class="category-squares">
                    <div class="category-square">
                        <a href=""><img src="<?php echo $baseURL; ?>storage/general/191.png" alt="Category 1"></a>
                        <a href="<?php echo $baseURL; ?>product-categories/mobile"><h4>Mobile Phone</h4></a>
                    </div>
                    <div class="category-square">
                       <a href=""> <img src="<?php echo $baseURL; ?>storage/general/audio-speaker.png" alt="Category 1"></a>
                       <a href="<?php echo $baseURL; ?>product-categories/speaker"> <h4>Speaker</h4> </a>
                    </div>
                    <div class="category-square">
                        <a href=""><img src="<?php echo $baseURL; ?>storage/general/icons8-headphones-80.png" alt="Category 1">
                            <a href="<?php echo $baseURL; ?>product-categories/head-phone"><h4>Head Phones</h4></a>
                    </div>
                    <div class="category-square">
                        <a href=""><img src="<?php echo $baseURL; ?>storage/general/touchscreen.png" alt="Category 1"></a>
                        <a href="<?php echo $baseURL; ?>product-categories/smart-watches"><h4>Smart Watches</h4></a>
                    </div>
                </div>
            </div>
            
            
            <h2  class="unique-featured-brands-heading">Featured Brands</h2>
            <div class="unique-featured-brands">
                <div class="unique-brand-container">
                    <a href="<?php echo $baseURL; ?>brands/jbl"><img src="<?php echo $baseURL; ?>storage/brands/jbl-logo-4dfd3fca95-seeklogocom.png" alt="Brand 1" class="unique-brand-image"></a>
                    <a href="<?php echo $baseURL; ?>brands/xiaomi"><img src="<?php echo $baseURL; ?>storage/brands/xiaomi-logo-768x432.png" alt="Brand 2" class="unique-brand-image"></a>
                    <a href="<?php echo $baseURL; ?>brands/apple"><img src="<?php echo $baseURL; ?>storage/brands/apple-logo-6-1024x1024.png" alt="Brand 3" class="unique-brand-image"></a>
                    <a href="<?php echo $baseURL; ?>brands/samsung"><img src="<?php echo $baseURL; ?>storage/brands/samsung-logo-2.png" alt="Brand 4" class="unique-brand-image"></a>
                    <a href="<?php echo $baseURL; ?>brands/fitbit"><img src="<?php echo $baseURL; ?>storage/brands/fitbit-logo-png-transparent.png" alt="Brand 5" class="unique-brand-image"></a>
                    <a href="<?php echo $baseURL; ?>brands/bose"><img src="<?php echo $baseURL; ?>storage/brands/bose-logo.png" alt="Brand 6" class="unique-brand-image"></a>
                    <a href="<?php echo $baseURL; ?>brands/vivo"><img src="<?php echo $baseURL; ?>storage/brands/vivo-logo-1.png" alt="Brand 6" class="unique-brand-image"></a>
                </div>
            </div>
            <h2  class="unique-featured-brands-heading" >Products List</h2>
            @include(Theme::getThemeNamespace('views.ecommerce.includes.product-items'))
        </div>
    </div>
</div>
