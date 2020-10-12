<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
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

Route::get('users', [UsersController::class, 'users'])->middleware('token');
Route::get('users/{id_role}/role', [UsersController::class, 'users_role'])->middleware('token');
Route::get('roles/{id_user}/user', [RolesController::class, 'roles_user'])->middleware('token');
Route::post('token', [UsersController::class, 'token']);