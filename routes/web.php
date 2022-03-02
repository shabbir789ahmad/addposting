<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\AdminAdsController;
use App\Http\Controllers\Admin\AdsPackageController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountDataController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\vendor\PackageController;
use App\Http\Controllers\vendor\AdsController;
use App\Http\Controllers\vendor\CartController;
use App\Http\Controllers\vendor\VendorContoller;
use App\Http\Controllers\vendor\LabourContoller;

use App\Http\Controllers\agent\AgentLoginController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SearchResultController;

Auth::routes();

 

 Route::get('/',[HomeController::class,'index']);
Route::view('ads/detail','');
Route::get('ads/{id}detail',[HomeController::class,'adsdetail'])->name('ads.detail');
Route::get('all/{id}/ads',[HomeController::class,'allAds'])->name('all.ads');
Route::get('sort/ads',[HomeController::class,'sortAds'])->name('sort.ads');
Route::get('vendor/{id}/product',[HomeController::class,'vendorProduct'])->name('vendor.product');
Route::get('searchresult',[SearchResultController::class,'searchResut'])->name('searchresult');

//ajax call data route 
Route::get('/get-city-id/{id}',[AdsController::class,'allAds']);
Route::get('/get-city-all',[CityController::class,'allCity']);
Route::get('/get-category-all',[CategoryController::class,'allCategory']);
Route::get('/get-area-all',[AreaController::class,'allArea']);
Route::get('/get-price-all',[PriceController::class,'price']);






Route::group(['prefix'=>'admin'],function()
{
  Route::group(['middleware'=>'admin.guest'],function()
  {
    Route::view('login','admin.admin_login')->name('admin.login');
    Route::post('authenticate',[AdminController::class,'adminLogin'])->name('admin.authenticate');
  });

  //loggedin route
  Route::group(['middleware'=>'admin.auth'],function()
  {
    Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('dashboard',[CountDataController::class,'index'])->name('admin.dashboard');
    // Route::get('dashboard',[CountController::class,'count2'])->name('admin.dashboard');

  //category routes crud
  Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');
    Route::get('/category/create', 'create')->name('category.create');
    Route::get('/category/{id}/edit', 'edit')->name('category.edit');
    Route::put('/category/{id}/update', 'update')->name('category.update');
    Route::post('/category/store', 'store')->name('category.store');
    Route::delete('/category/{id}/destroy', 'destroy')->name('category.destroy');
  });
  //sub category route
  Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/subcategory', 'index')->name('subcategory.index');
    Route::get('/subcategory/create', 'create')->name('subcategory.create');
    Route::get('/subcategory/{id}/edit', 'edit')->name('subcategory.edit');
    Route::put('/subcategory/{id}/update', 'update')->name('subcategory.update');
    Route::post('/subcategory/store', 'store')->name('subcategory.store');
    Route::delete('/subcategory/{id}/destroy', 'destroy')->name('subcategory.destroy');
  });
  //slider routes crud
  Route::controller(SliderController::class)->group(function () {
    Route::get('/slider', 'index')->name('slider.index');
    Route::get('/slider/create', 'create')->name('slider.create');
    Route::get('/slider/{id}/edit', 'edit')->name('slider.edit');
    Route::put('/slider/{id}/update', 'update')->name('slider.update');
    Route::post('/slider/store', 'store')->name('slider.store');
    Route::delete('/slider/{id}/destroy', 'destroy')->name('slider.destroy');
  });
  //admin ads routes crud
  Route::controller(AdminAdsController::class)->group(function () {
    Route::get('/banner', 'index')->name('banner.index');
    Route::get('/banner/create', 'create')->name('banner.create');
    Route::get('/banner/{id}/edit', 'edit')->name('banner.edit');
    Route::put('/banner/{id}/update', 'update')->name('banner.update');
    Route::post('/banner/store', 'store')->name('banner.store');
    Route::delete('/banner/{id}/destroy', 'destroy')->name('banner.destroy');
  });
  // ads package routes crud
  Route::controller(AdsPackageController::class)->group(function () {
    Route::get('/package', 'index')->name('packages.index');
    Route::get('/package/create', 'create')->name('packages.create');
    Route::get('/package/{id}/edit', 'edit')->name('packages.edit');
    Route::put('/package/{id}/update','update')->name('packages.update');
    Route::put('/package/discount','discount')->name('packages.update2');
    Route::post('/package/store', 'store')->name('packages.store');
    Route::delete('/package/{id}/destroy', 'destroy')->name('packages.destroy');
  });
  // ads package routes crud
  Route::controller(StateController::class)->group(function () {
    Route::get('/state', 'index')->name('state.index');
    Route::get('/state/create', 'create')->name('state.create');
    Route::get('/state/{id}/edit', 'edit')->name('state.edit');
    Route::put('/state/{id}/update','update')->name('state.update');
    Route::post('/state/store', 'store')->name('state.store');
    Route::delete('/state/{id}/destroy', 'destroy')->name('state.destroy');
  });
  Route::controller(CityController::class)->group(function () {
    Route::get('/city', 'index')->name('city.index');
    Route::get('/city/create', 'create')->name('city.create');
    Route::get('/city/{id}/edit', 'edit')->name('city.edit');
    Route::put('/city/{id}/update','update')->name('city.update');
    Route::post('/city/store', 'store')->name('city.store');
    Route::delete('/city/{id}/destroy', 'destroy')->name('city.destroy');
  });
  Route::controller(UserController::class)->group(function () {
    Route::get('/vendor', 'index')->name('vendor.index');
    Route::get('approve/this/user','update');

    Route::delete('/vendor/{id}/destroy', 'destroy')->name('vendor.destroy');
    Route::get('/user', 'index2')->name('user.index');
  });

  //type route
   Route::resource('type', TypeController::class);
  //ads order route
  
   Route::get('order',[OrderController::class,'index'])->name('order.index');
   Route::get('orders/destroy',[OrderController::class,'destroy']);
  });
});





//route for vendor dashboard
Route::group(['middleware'=>['auth','vendor']],function()
{
  
   Route::get('dashboard',[VendorContoller::class,'count'])->name('vendor.dashboard');

   Route::controller(PackageController::class)->group(function () {
    Route::get('/package','index')->name('package.index');
    Route::get('/package/create', 'create')->name('package.create');
    Route::get('/package/{id}/edit', 'edit')->name('package.edit');
    Route::put('/package/{id}/update', 'update')->name('package.update');
    Route::post('/package/store', 'store')->name('package.store');
    Route::delete('/package/{id}/destroy', 'destroy')->name('package.destroy');

   
  });
   Route::controller(AdsController::class)->group(function () {
    Route::get('/ads', 'index')->name('ads.index');
    Route::get('/ads2', 'index2')->name('ads.index2');
    Route::get('/get-al-category/{id}', 'category');
    Route::get('/get-city-id/{id}', 'city');
    Route::get('/ads/create/{id}', 'create')->name('ads.create');
    Route::get('/ads/{id}/edit', 'edit')->name('ads.edit');
    Route::put('/ads/{id}/update', 'update')->name('ads.update');
    Route::post('/ads/store', 'store')->name('ads.store');
    Route::delete('/ads/{id}/destroy', 'destroy')->name('ads.destroy');
   
  });

   Route::controller(VendorContoller::class)->group(function () {
       Route::get('/profile', 'index')->name('profile.index');
      Route::put('/vendor/{id}/update', 'update')->name('profile.update');
   });

   //add to cart route
   Route::controller(CartController::class)->group(function () {
   Route::get('add-to-cart/{id}','addToCart');
   Route::get('/remove-from-cart/{id}','remove');
   Route::patch('/update-from-cart/{id}','update');
   Route::post('/buy/package','order')->name('buy.package');
   
   });
   Route::view('/cart','vendor.package.cart')->name('cart');
  
   //vendor create user route
   Route::resource('labour', LabourContoller::class);
   Route::post('assign/ads',[LabourContoller::class,'assignAd'])->name('asign.ads');
});





//route for user dashboard
Route::group(['middleware'=>'user'],function()
{
  Route::view('user/dashboard','user.user')->name('user.dashboard');

});



Route::group(['prefix'=>'agent'],function()
{
  Route::group(['middleware'=>'labour.guest'],function()
  {
    Route::view('login','admin.agent_login')->name('agent.login');
    Route::post('authenticate',[AgentLoginController::class,'agentLogin'])->name('agent.authenticate');
  });

  //loggedin route
  Route::group(['middleware'=>'labour.auth'],function()
  {
    Route::post('logout',[AgentLoginController::class,'logout'])->name('agent.logout');
    Route::get('dashboard',[AgentLoginController::class,'index'])->name('agent.dashboard');
   

  });

});