<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware()->group(function () {
Route::apiResource('brands', BrandController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('sub_categories', SubCategoryController::class);
Route::apiResource('sub_category_features', SubCategoryFeatureController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('product_features', ProductFeatureController::class);
Route::apiResource('product_galleries', ProductGalleryController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('purchases', PurchaseController::class);
Route::apiResource('purchase_items', PurchaseItemController::class);
// });
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('requestCode', [AuthController::class, 'requestCode']);
//add to cart
//remove from cart
//finialize
// get products
//search
//get products by category
//get products by sub category
// activate
