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

Route::get('/', function () {
    return view('web_template');
});

Route::get('/admin', function () {
    //dd(bcrypt("Password"));
    return view('admin_template');
});

Route::post('admin/signin', [App\Http\Controllers\Admin\Signin\Signin::class, 'index']);
