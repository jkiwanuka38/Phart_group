<?php
    use Gloudemans\Shoppingcart\Facades\Cart;

    Route::get('/', 'LandingPageController@index')->name('landing_page');
    Route::get('/about', 'LandingPageController@about')->name('about');
    Route::get('/gallery', 'LandingPageController@gallery')->name('gallery');
    Route::get('/contact', 'LandingPageController@contact')->name('contact');
    Route::post('/contact', 'LandingPageController@sendMessage')->name('contactMessage');
    Route::get('/shop', 'ShopController@index')->name('shop.index');
    Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
    Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
    Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
    Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
    Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');
    Route::get('/search', 'ShopController@search')->name('search');
    Route::get('empty', function() {
        Cart::destroy();
    });



    // Route::view('/about', 'about');
    // Route::view('/shop', 'products');
    // Route::view('/single', 'single');
    // Route::view('/cart', 'cart');
    // Route::view('/checkout', 'checkout');
    // Route::view('/gallery', 'gallery');
    // Route::view('/contact', 'contact');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
