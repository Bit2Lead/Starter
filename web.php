<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\NotFoundHttpException;
//use App\Http\Middleware\Has_session;

//Route::get('admin/login', '\App\Http\Controllers\Admin\Login@index');

Route::group(['prefix'=>'admin'], function(){

	    if (Request::is('admin/*')) {

    		if (Request::segment(3)) {
				$method = "@".Request::segment(3);
				$route_method = Request::segment(3);
			}else{
				$method = "@index";
				$route_method = "index";
			}
			$class = '\App\Http\Controllers\Admin\\'.ucwords(strtolower(Request::segment(2)));

			$class_method = $class.$method;
			if (!empty(Request::segment(4))) {
				$id = "/{id}";
			}else{
				$id = "";
			}
			
			if (Request::isMethod('post')) {

				if(class_exists($class)){
					if (!empty(Request::segment(3))) {
						if(method_exists($class, $route_method)){
							Route::post(Request::segment(2)."/".$route_method."$id", $class_method);
						}else{
							Route::post(Request::segment(2)."/".$route_method."$id", '\App\Http\Controllers\Admin\Error@admin_404');
						}
					}else{
						if(method_exists($class, $route_method)){
							Route::post(Request::segment(2), $class_method);
						}else{
							Route::post(Request::segment(2)."/".$route_method."$id", '\App\Http\Controllers\Admin\Error@admin_404');
						}
					}
					
				}else{
					Route::post(Request::segment(2), '\App\Http\Controllers\Admin\Error@admin_404');
				}
			}else{
				if(class_exists($class)){
					if (!empty(Request::segment(3))) {
						if(method_exists($class, $route_method)){
							Route::get(Request::segment(2)."/".$route_method."$id", $class_method);
						}else{
							Route::get(Request::segment(2)."/".$route_method."$id", '\App\Http\Controllers\Admin\Error@admin_404');
						}
					}else{
						if(method_exists($class, $route_method)){
							Route::get(Request::segment(2), $class_method);
						}else{
							Route::get(Request::segment(2)."/".$route_method."$id", '\App\Http\Controllers\Admin\Error@admin_404');
						}
					}
					
				}else{
					/// only error.
					Route::get(Request::segment(2), '\App\Http\Controllers\Admin\Error@admin_404');
				}
			}

		}else{
			Route::get(Request::segment(2), '\App\Http\Controllers\Admin\Login@index');
		}

	
   /* // login and logout.
    Route::get('login/login_template/{id}', [Login::class, 'login_template']);
	Route::match(array('GET', 'POST'), 'login', [Login::class, 'index']);
	Route::get('logout', [Login::class, 'logout_user']);
	// Admin panel settings .
	Route::match(array('GET', 'POST'), 'admin_panel_settings/admin_panel_settings_create', [Admin_panel_settings::class, 'admin_panel_settings_create']);
	Route::get('admin_panel_settings/admin_panel_settings_all', [Admin_panel_settings::class, 'admin_panel_settings_all']);
	Route::match(array('GET', 'POST'), 'admin_panel_settings/admin_panel_settings_edit/{id}', [Admin_panel_settings::class, 'admin_panel_settings_edit']);
	Route::match(array('GET', 'POST'), 'admin_panel_settings/admin_panel_settings_copy/{id}', [Admin_panel_settings::class, 'admin_panel_settings_copy']);
	Route::post('admin_panel_settings/admin_panel_settings_delete', [Admin_panel_settings::class, 'admin_panel_settings_delete']);
	Route::post('admin_panel_settings/admin_panel_name_check', [Admin_panel_settings::class, 'admin_panel_name_check'])->name('admin_panel_name_check');
	//Route::post('admin_panel_settings/server', [Admin_panel_settings::class, 'server']);
	Route::post('admin_panel_settings/server', [Common::class, 'server']);
	Route::post('admin_panel_settings/delete_img', [Admin_panel_settings::class, 'delete_img']);

	//Users
	Route::match(array('GET', 'POST'), 'users/users_create', [Users::class, 'users_create']);
	Route::match(array('GET', 'POST'), 'users/users_create', [Users::class, 'users_create']);
	Route::get('users/users_all', [Users::class, 'users_all']);
	Route::match(array('GET', 'POST'), 'users/users_edit/{id}', [Users::class, 'users_edit']);
	Route::post('users/users_delete/{id}', [Users::class, 'users_delete']);
	Route::post('users/users_check', [Users::class, 'users_check']);
	Route::post('users/users_delete', [Users::class, 'users_delete']);
	Route::match(array('GET', 'POST'), 'users/change_password/{id}', [Users::class, 'change_password']);
	Route::post('users/column_check', [Users::class, 'column_check']);

	//User_role.
	Route::match(array('GET', 'POST'), 'user_role/user_role_create', [User_role::class, 'user_role_create']);
	Route::get('user_role/user_role_all', [User_role::class, 'user_role_all']);
	Route::match(array('GET', 'POST'), 'user_role/user_role_edit/{id}', [User_role::class, 'user_role_edit']);
	Route::post('user_role/column_check', [Users::class, 'column_check']);
	Route::post('user_role/user_role_check', [User_role::class, 'user_role_check']);
	Route::post('user_role/user_role_check', [User_role::class, 'user_role_check']);
	Route::post('user_role/user_role_delete', [User_role::class, 'user_role_delete']);
	//main dashboard.
	Route::get('dashboard', [dashboard::class, 'index']);*/
	//Route::get('dashboard', '\App\Http\Controllers\Admin\Dashboard@index');
});








//Route::get('/',  [dashboard::class, 'home']);
Route::get('/', '\App\Http\Controllers\Admin\Home@home');

