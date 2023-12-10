<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});

Route::get('/user/DataUser', [UserController::class, 'index_tampil_User']);
Route::get('/user/DataUser/{id}', [UserController::class, 'index_by_id']);          
Route::post('/user/TambahUser', [UserController::class, 'Tambah_User']);  
Route::post('/user/EditDataUser/{id}', [UserController::class, 'update_data']);     
Route::post('/user/DeleteDataUser/{id}', [UserController::class, 'Delete_data']);    


// ==============================

Route::get('/account/DataAccount', [AccountController::class, 'index_Tambah_account']);
Route::post('/account/TambahAccount', [AccountController::class, 'Tambah_Account']);
Route::get('/account/DataAccount/{id}', [AccountController::class, 'index_by_id']);         
Route::post('/account/EditDataAccount/{id}', [AccountController::class, 'update_data']);     
Route::post('/account/DeleteDataAccount/{id}', [AccountController::class, 'Delete_data']);   
// =====================
Route::post('/Login', [AccountController::class, 'login']);
Route::post('/Register', [AccountController::class, 'Register']);