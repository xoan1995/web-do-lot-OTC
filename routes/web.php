<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::namespace('Themes')->group(function(){
    Route::prefix('lien-he')->name('lien-he.')->group(function(){
        Route::get('/','ContactController@index')->name('index');
        Route::post('/','ContactController@store')->name('store');
    });

    Route::get('/tintuc','NewsController@index')->name('tin-tuc.index');

    Route::post('/search','SearchController@search')->name('search');
    Route::post('/searchCategry/{category}','SearchController@searchCategry')->name('searchCategry');
    Route::post('/searchType/{category}','SearchController@searchType')->name('searchType');
    Route::post('/searchSize/{category}','SearchController@searchSize')->name('searchSize');
    Route::post('/searchColor/{category}','SearchController@searchColor')->name('searchColor');
    Route::post('/searchRange/{category}','SearchController@searchRange')->name('searchRange');

    Route::prefix('cart')->name('cart.')->group(function(){
        Route::get('/','CartController@index')->name('index');
        Route::post('/','CartController@store')->name('store');
        Route::post('/update/{id}','CartController@update')->name('update');
        Route::delete('/{id}','CartController@destroy')->name('destroy');
        Route::post('/saveForLater/{id}','CartController@saveForLater')->name('saveforlater');
        Route::post('/addtocart','CartController@addToCart')->name('addtocart');
        Route::POST('/empty/{rowId}','CartController@destroy')->name('destroy');
    });

    Route::delete('/saveForLater/{id}','SaveForLaterController@destroy');
    Route::post('/saveForLater/moveToCart/{id}','SaveForLaterController@moveToCart')->name('movetocart');
    Route::post('checkout','CheckoutController@store')->name('checkout');
    Route::get('checkout/check/','CheckoutController@checkVoncher')->name('checkout.check');

    Route::get('/', 'IndexController@index')->name('trang-chu');
    Route::get('/danh-sach/{category}','IndexController@list');
    Route::get('/{category}','IndexController@category');
    Route::get('/{category}/chi-tiet/{name}','IndexController@show');
});

Route::get('admin/index','Admin\DashboardController@index')->middleware('auth')->middleware('can:manage-users')->name('admin.index');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::prefix('giao-dien')->name('giao-dien.')->middleware('can:edit-users')->group(function(){
        Route::get('/','ThemesController@index')->name('index');
        Route::put('/{id}','ThemesController@update')->name('update');
    });
    Route::prefix('code')->name('code.')->middleware('can:edit-users')->group(function(){
        Route::get('/','CodeController@index')->name('index');
        Route::post('/','CodeController@store')->name('store');
        Route::delete('/{id}','CodeController@destroy')->name('destroy');
    });

    Route::prefix('footer')->name('footer.')->middleware('can:edit-users')->group(function(){
        Route::get('/','FooterController@index')->name('index');
        Route::get('/create','FooterController@create')->name('create');
        Route::post('/create','FooterController@store')->name('store');
        Route::get('/edit/{id}','FooterController@edit')->name('edit');
        Route::put('/edit/{id}','FooterController@update')->name('update');
        Route::delete('/delete/{id}','FooterController@destroy')->name('destroy');
    });

    Route::prefix('banner')->name('banner.')->middleware('can:edit-users')->group(function(){
        Route::get('/','BannerController@index')->name('index');
        Route::post('/','BannerController@store')->name('store');
        Route::get('/edit/{id}','BannerController@edit')->name('edit');
        Route::put('/{id}','BannerController@update')->name('update');
        Route::delete('/{id}','BannerController@destroy')->name('destroy');
    });

    Route::prefix('partner')->name('partner.')->middleware('can:edit-users')->group(function(){
        Route::get('/','PartnerController@index')->name('index');
        Route::post('/','PartnerController@store')->name('store');
        Route::put('/{id}','PartnerController@update')->name('update');
        Route::delete('/{id}','PartnerController@destroy')->name('destroy');
    });

    Route::prefix('social')->name('social.')->middleware('can:edit-users')->group(function(){
        Route::get('/','SocialController@index')->name('index');
        Route::post('/','SocialController@store')->name('store');
        Route::put('/{id}','SocialController@update')->name('update');
        Route::delete('/{id}','SocialController@destroy')->name('destroy');
    });
    Route::prefix('logo')->name('logo.')->middleware('can:edit-users')->middleware('can:admin-users')->group(function(){
        Route::get('/','LogoController@index')->name('index');
        Route::post('/','LogoController@store')->name('store');
        Route::put('/{id}','LogoController@update')->name('update');
        Route::delete('/{id}','LogoController@destroy')->name('destroy');
    });

    Route::prefix('danh-muc-cha')->name('danh-muc-cha.')->middleware('can:admin-users')->group(function(){
        Route::get('/','CategoryController@parent')->name('index');
        Route::post('/','CategoryController@parentCreate')->name('store');
        Route::put('showIndex/{id}','CategoryController@parentShow')->name('show');
        Route::POST('/update','CategoryController@parentUpdate')->name('update');
        Route::delete('/{id}','CategoryController@parentDelete')->name('destroy');
        Route::put('/{id}','CategoryController@parentEdit')->name('edit');
    });

    Route::prefix('danh-muc')->name('danh-muc.')->middleware('can:admin-users')->group(function(){
        Route::get('/','CategoryController@index')->name('index');
        Route::post('/','CategoryController@store')->name('store');
        Route::put('show/{id}','CategoryController@show')->name('show');
        Route::get('/edit/{id}','CategoryController@edit')->name('edit');
        Route::put('/edit/{id}','CategoryController@update')->name('update');
        Route::delete('delete/{id}','CategoryController@destroy')->name('destroy');
    });

    Route::prefix('bai-viet')->name('bai-viet.')->middleware('can:edit-users')->group(function(){
        Route::get('/','AboutController@index')->name('index');
        Route::get('/create','AboutController@create')->name('create');
        Route::post('/create','AboutController@store')->name('store');
        Route::get('/edit/{id}','AboutController@edit')->name('edit');
        Route::patch('/edit/{id}','AboutController@update')->name('update');
        Route::delete('/destroy/{id}','AboutController@destroy')->name('destroy');
        Route::get('/{category}','AboutController@index')->name('gallery');
    });

    Route::prefix('san-pham')->name('san-pham.')->middleware('can:edit-users')->group(function(){
        Route::get('/','ProductController@index')->name('index');
        Route::post('/create','ProductController@store')->name('store');
        Route::get('/create','ProductController@create')->name('create');
        Route::put('/show/{id}','ProductController@show')->name('show');

        Route::get('/edit/{id}','ProductController@edit')->name('edit');
        Route::patch('/{id}','ProductController@update')->name('update');
        Route::delete('/delete/{id}','ProductController@destroy')->name('destroy');
    });

    Route::prefix('tuy-chinh')->name('tuy-chinh.')->middleware('can:edit-users')->group(function(){
        Route::post('/color','StyleController@colorStore')->name('color');
        Route::delete('/color/delete/{id}','StyleController@colorDestroy')->name('colorDestroy');
        Route::post('/size','StyleController@sizeStore')->name('size');
        Route::delete('/size/delete/{id}','StyleController@sizeDestroy')->name('sizeDestroy');
        Route::get('/','StyleController@index')->name('index');
    });

    Route::prefix('kieu-dang')->name('kieu-dang.')->middleware('can:edit-users')->group(function(){
        Route::get('/','TypeController@index')->name('index');
        Route::post('/','TypeController@store')->name('store');
        Route::delete('delete/{id}','TypeController@destroy')->name('destroy');
    });
    Route::prefix('thu-vien')->name('thu-vien.')->middleware('can:edit-users')->group(function(){
        Route::get('/gallery','GalleryController@galleryIndex')->name('gallery.show');
        Route::post('/gallery','GalleryController@gallery')->name('gallery');
        Route::post('/gallery/delete','GalleryController@galleryDestroy')->name('gallery.destroy');
    });

    Route::prefix('lien-he')->name('lien-he.')->middleware('can:seller-users')->group(function(){
        Route::get('/','ContactController@index')->name('index');
        Route::delete('/{id}','ContactController@destroy')->name('destroy');
        Route::get('/orders','ContactController@ordersIndex')->name('orders');
        Route::delete('/orders','ContactController@orderDestroy')->name('orders.destroy');
    });

    Route::prefix('nguoi-dung')->name('nguoi-dung.')->middleware('can:edit-users')->group(function(){
        Route::get('/danh-sach','UserController@index')->name('index');
        Route::get('/tao-nguoi-dung','UserController@create')->name('create');
        Route::post('/danh-sach','UserController@store')->name('store');
        Route::put('/danh-sach/update/{id}','UserController@update')->name('update');
        Route::delete('/danh-sach/delete/{id}','UserController@destroy')->name('destroy');
    });

    Route::prefix('pricesale')->name('pricesale.')->group(function(){
        Route::post('/create','PriceSaleController@store')->name('store');
        Route::delete('/delete/{id}','PriceSaleController@destroy')->name('destroy');
    });

    Route::prefix('seller')->name('seller.')->middleware('can:seller-users')->group(function(){
        Route::get('/danh-sach','SellerController@index')->name('index');
        Route::get('/create','SellerController@create')->name('create');
        Route::post('/create','SellerController@store')->name('store');
        Route::delete('productsale/{id}','SellerController@productSaleDestroy')->name('productSale.destroy');
        Route::patch('/updatesaleprice/{id}','SellerController@updateSalePrice')->name('updatesaleprice.update');
    });

    Route::prefix('maps')->name('maps.')->middleware('can:edit-users')->middleware('can:admin-users')->group(function(){
        Route::get('/','MapController@index')->name('index');
        Route::put('/update/{id}','MapController@update')->name('update');
    });
});
