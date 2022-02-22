<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\AdminAdsController;
use App\Http\Controllers\admin\AdsPackageController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\CountDataController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\UserController;

use App\Http\Controllers\vendor\PackageController;
use App\Http\Controllers\vendor\AdsController;
use App\Http\Controllers\vendor\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PriceController;

Auth::routes();

// Route::get('/', function () {
//     return view('websites.landing');
// });
 Route::get('/',[HomeController::class,'index']);
Route::view('ads/detail','');
Route::get('ads/{id}detail',[HomeController::class,'adsdetail'])->name('ads.detail');
Route::get('all/{id}/ads',[HomeController::class,'allAds'])->name('all.ads');
Route::get('sort/ads',[HomeController::class,'sortAds'])->name('sort.ads');

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

  });
});





//route for vendor dashboard
Route::group(['middleware'=>'vendor'],function()
{
  
   Route::view('dashboard','vendor.dashboard')->name('vendor.dashboard');
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
   //add to cart route
   Route::get('add-to-cart/{id}',[CartController::class,'addToCart']);
   Route::get('/remove-from-cart/{id}',[CartController::class,'remove']);
   Route::patch('/update-from-cart/{id}',[CartController::class,'update']);
   Route::view('/cart','vendor.package.cart')->name('cart');
});





//route for vendor dashboard
Route::group(['middleware'=>'user'],function()
{
  Route::view('user/dashboard','user.user')->name('user.dashboard');

});

