<?php

use Theme\Farmart\Http\Controllers\FarmartController;

// Custom routes
Route::group(['controller' => FarmartController::class, 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::group(['prefix' => 'ajax', 'as' => 'public.ajax.'], function () {
            Route::get('search-products', [
                'uses' => 'ajaxSearchProducts',
                'as' => 'search-products',
            ]);

            Route::get('products', [
                'uses' => 'ajaxGetProducts',
                'as' => 'products',
            ]);

            Route::get('esentialproducts', [
                'uses' => 'esentialajaxGetProducts',
                'as' => 'esentialproducts',
            ]);

            Route::get('featured-product-categories', [
                'uses' => 'ajaxGetFeaturedProductCategories',
                'as' => 'featured-product-categories',
            ]);

            Route::get('featured-brands', [
                'uses' => 'ajaxGetFeaturedBrands',
                'as' => 'featured-brands',
            ]);

            Route::get('get-flash-sale/{id}', [
                'uses' => 'ajaxGetFlashSale',
                'as' => 'get-flash-sale',
            ])->where('id', BaseHelper::routeIdRegex());

//            New flash sale

            Route::get('get-flash-sale/new/{id}', [
                'uses' => 'ajaxGetFlashSalenew',
                'as' => 'get-flash-sale-new',
            ])->where('id', BaseHelper::routeIdRegex());

            Route::get('product-categories/products', [
                'uses' => 'ajaxGetProductsByCategoryId',
                'as' => 'product-category-products',
            ]);

//            JUST landed or new arrival product section

            Route::get('product-categories/products/land', [
                'uses' => 'ajaxGetProductsByCategoryIdLand',
                'as' => 'product-category-productsland',
            ]);

            Route::get('featured-products', [
                'uses' => 'ajaxGetFeaturedProducts',
                'as' => 'featured-products',
            ]);

//            New Featured Products

            Route::get('featured-products/new', [
                'uses' => 'ajaxGetFeaturedProductsnew',
                'as' => 'featured-products-new',
            ]);

            Route::get('featured-products/newSection', [
                'uses' => 'ajaxGetFeaturedProductsnewSection',
                'as' => 'featured-products-newSection',
            ]);

            Route::get('cart', [
                'uses' => 'ajaxCart',
                'as' => 'cart',
            ]);

            Route::get('quick-view/{id?}', [
                'uses' => 'ajaxGetQuickView',
                'as' => 'quick-view',
            ])->where('id', BaseHelper::routeIdRegex());

            Route::post('add-to-wishlist/{id?}', [
                'uses' => 'ajaxAddProductToWishlist',
                'as' => 'add-to-wishlist',
            ])->where('id', BaseHelper::routeIdRegex());

            Route::get('related-products/{id}', [
                'uses' => 'ajaxGetRelatedProducts',
                'as' => 'related-products',
            ])->where('id', BaseHelper::routeIdRegex());

            Route::get('product-reviews/{id}', [
                'uses' => 'ajaxGetProductReviews',
                'as' => 'product-reviews',
            ])->where('id', BaseHelper::routeIdRegex());

            Route::get('get-product-categories', [
                'uses' => 'ajaxGetProductCategories',
                'as' => 'get-product-categories',
            ]);

            Route::get('recently-viewed-products', [
                'uses' => 'ajaxGetRecentlyViewedProducts',
                'as' => 'recently-viewed-products',
            ]);

            Route::post('ajax/contact-seller', 'ajaxContactSeller')
                ->name('contact-seller');
        });
    });
});

Theme::routes();
