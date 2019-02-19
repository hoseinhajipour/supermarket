<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::any('create', 'UserController@create')->name('admin.user.create');
        Route::any('update/{id}', 'UserController@update')->name('admin.user.update');
        Route::get('delete/{user}', 'UserController@delete')->name('admin.user.delete');
        Route::get('susspend/{user}', 'UserController@susspend')->name('admin.user.susspend');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.category.index');
        Route::any('create', 'CategoryController@create')->name('admin.category.create');
        Route::any('update/{id}', 'CategoryController@update')->name('admin.category.update');
        Route::get('delete/{category}', 'CategoryController@delete')->name('admin.category.delete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')->name('admin.product.index');
        Route::any('create', 'ProductController@create')->name('admin.product.create');
        Route::any('update/{id}', 'ProductController@update')->name('admin.product.update');
        Route::get('delete/{product}', 'ProductController@delete')->name('admin.product.delete');
        Route::get('approved/{product}', 'ProductController@approved')->name('admin.product.approved');
        Route::get('hidden/{product}', 'ProductController@hidden')->name('admin.product.hidden');
        Route::any('upload/{product}', 'ProductController@upload')->name('admin.product.upload');
        Route::any('delete/{product}/{id}', 'ProductController@deleteImg')->name('admin.product.image.delete');
        Route::any('pin/{product}/{id}', 'ProductController@pinImg')->name('admin.product.image.pin');
    });
    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', 'ShopController@index')->name('admin.shop.index');
        Route::any('create', 'ShopController@create')->name('admin.shop.create');
        Route::any('update/{id}', 'ShopController@update')->name('admin.shop.update');
        Route::get('delete/{shop}', 'ShopController@delete')->name('admin.shop.delete');
        Route::get('approved/{shop}', 'ShopController@approved')->name('admin.shop.approved');
        Route::get('hidden/{shop}', 'ShopController@approved')->name('admin.shop.hidden');
    });

    Route::group(['prefix' => 'upload'], function () {
        Route::get('/', 'UploadController@index')->name('admin.upload.index');
        Route::any('create', 'UploadController@create')->name('admin.upload.create');
        Route::get('delete/{id}', 'UploadController@delete')->name('admin.upload.delete');
    });
    Route::group(['prefix' => 'province'], function () {
        Route::get('/', 'ProvinceController@index')->name('admin.province.index');
        Route::any('create', 'ProvinceController@create')->name('admin.province.create');
        Route::any('update/{id}', 'ProvinceController@update')->name('admin.province.update');
        Route::get('delete/{Province}', 'ProvinceController@delete')->name('admin.province.delete');
    });
    Route::group(['prefix' => 'city'], function () {
        Route::get('/', 'CityController@index')->name('admin.city.index');
        Route::any('create', 'CityController@create')->name('admin.city.create');
        Route::any('update/{id}', 'CityController@update')->name('admin.city.update');
        Route::get('delete/{City}', 'CityController@delete')->name('admin.city.delete');
    });
    Route::group(['prefix' => 'address'], function () {
        Route::get('/', 'AddressController@index')->name('admin.address.index');
        Route::any('create', 'AddressController@create')->name('admin.address.create');
        Route::any('update/{id}', 'AddressController@update')->name('admin.address.update');
        Route::get('delete/{address}', 'AddressController@delete')->name('admin.address.delete');
    });
    Route::group(['prefix' => 'factor'], function () {
        Route::get('/', 'FactorController@index')->name('admin.factor.index');
        Route::any('update/{id}', 'FactorController@update')->name('admin.factor.update');
    });
    Route::group(['prefix' => 'payment'], function () {
        Route::get('/', 'PaymentController@index')->name('admin.payment.index');
    });
    Route::group(['prefix' => 'wallet'], function () {
        Route::get('/', 'WalletController@index')->name('admin.wallet.index');
        Route::any('create', 'WalletController@create')->name('admin.wallet.create');
        Route::get('update/{id}', 'WalletController@update')->name('admin.wallet.update');
    });
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', 'CartController@index')->name('admin.cart.index');
        Route::get('delete/{cart}', 'CartController@update')->name('admin.cart.update');
    });
    Route::get('logout', 'HomeController@logout')->name('admin.logout');
});


Route::get('/', 'HomeController@index');
