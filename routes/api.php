<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/product","ProductController");
Route::group(['prefix'=>'product'],function(){
  Route::apiResource("/{product}/review","ReviewController");
});
