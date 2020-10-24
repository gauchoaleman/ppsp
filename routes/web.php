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

Route::get('/', 'App\Http\Controllers\ShowRoot');
Route::get('/home', 'App\Http\Controllers\ShowPage');
Route::any('/config/login', 'App\Http\Controllers\Config\Login');
Route::any('/config/logout', 'App\Http\Controllers\Config\Logout');
Route::get('/config/home', 'App\Http\Controllers\ShowPage');
Route::any('/config/menu/level1/add_item', 'App\Http\Controllers\Config\Menu\Level1\AddItem');
Route::any('/config/menu/level1/list_items', 'App\Http\Controllers\Config\Menu\Level1\ListItems');
Route::any('/config/menu/level1/del_item/{id}', 'App\Http\Controllers\Config\Menu\Level1\DelItem');

