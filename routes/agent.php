<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agent\AgentLoginController;

 // Route::get('/sort', function () {
 //      return view('websites.sort_product');
 //  });

// Route::group(['prefix'=>'labour'],function()
// {
//   Route::group(['middleware'=>'labour.guest'],function()
//   {
//     Route::view('login','admin.agent_login')->name('labour.login');
//     Route::post('authenticate',[AgentLoginController::class,'agentLogin'])->name('labour.authenticate');
//   });

//   //loggedin route
//   Route::group(['middleware'=>'labour.auth'],function()
//   {
//     Route::post('logout',[AgentLoginController::class,'logout'])->name('labour.logout');
//     Route::get('dashboard',[AgentLoginController::class,'index'])->name('labour.dashboard');
   

//   });

// });

