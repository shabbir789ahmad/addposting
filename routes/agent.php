<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agent\AgentLoginController;
use App\Http\Controllers\agent\AgentAdController;
use App\Http\Controllers\agent\AgentProfileController;
use App\Http\Controllers\MessageController;

 // Route::get('/sort', function () {
 //      return view('websites.sort_product');
 //  });

Route::get('/contact', function () {
      return view('websites.contact');
  });
Route::get('/about', function () {
      return view('websites.about');
  });
Route::post('send/message', [MessageController::class,'index'])->name('send.message');
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
    
  

    Route::controller(AgentAdController::class)->group(function () {
    Route::get('/ads', 'index')->name('agent.ads.index');
    Route::get('/ads2', 'index2')->name('agent.ads.index2');
    Route::get('get-al-category2/{id}', 'category');
    Route::get('agent/get-city-id/{id}', 'city');
    Route::get('ads/create2/{id}', 'create')->name('agent.ads.create2');
    Route::post('agent/ads/store', 'store')->name('agent.ads.store');
   
   });
   
   Route::controller(AgentProfileController::class)->group(function () {
       Route::get('/profile', 'index')->name('agent.profile.index');
       Route::put('/agent/{id}/update', 'update')->name('agent.profile.update');
       Route::get('dashboard','count')->name('agent.dashboard');
   });
 
  });//labour auth

});

