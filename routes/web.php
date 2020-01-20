<?php

Route::prefix('user')->group(function () {
    Route::middleware(['signedguard'])->group(function () {
        Route::get('signin', 'UserController@getSignIn');
        Route::post('signin', 'UserController@postSignIn');
        Route::get('signup', 'UserController@getSignUp');
        Route::post('signup', 'UserController@postSignUp');
    });
    Route::get('logout', 'UserController@logout');

});

Route::prefix('cms')->group(function () {
    Route::middleware(['cmsguard'])->group(function () {
        Route::get('dashboard', 'CmsController@dashboard');
        Route::get('orders', 'CmsController@orders');
        Route::get('deleteallorders', 'CmsController@deleteAllOrders');

        Route::resource('menu', 'MenuController');
        Route::resource('content', 'ContentController');
        Route::resource('subcategories', 'SubCategoriesController');
        Route::resource('products', 'ProductsController');
        Route::get('deleteorder/{id}', 'CmsController@deleteOrder');

    });
});

Route::prefix('shop')->group(function () {
    Route::get('checkout', 'ShopController@getBillingDetails');
    //Route::get('categories', 'ShopController@categories');
    Route::get('cart', 'ShopController@cart');
    Route::get('orderplaced', 'ShopController@orderPlaced');
    Route::get('clear-cart', 'ShopController@clearCart');
    Route::get('update-cart', 'ShopController@updateCart');
    Route::get('add-to-cart', 'ShopController@addToCart');
    Route::post('checkout', 'ShopController@postCheckout');
    Route::get('women/{surl}', 'ShopController@getProducts');
    Route::get('men/{surl}', 'ShopController@getProducts');
    Route::get('kids/{surl}', 'ShopController@getProducts');
    Route::get('remove-item/{id}', 'ShopController@removeItem');
    //Route::get('{curl}', 'ShopController@products');
    // Route::get('{curl}/{purl}', 'ShopController@item');
    Route::get('{curl}/{surl}/{purl}', 'ShopController@item');
});

Route::get('search-products', 'PagesController@ajax');
Route::get('search', 'PagesController@search');
Route::get('/', 'PagesController@home');
Route::get('info/{url}', 'PagesController@content');

