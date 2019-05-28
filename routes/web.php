<?php

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
    return view('welcome');
});

Auth::routes();


Route::get('dashboard', 'DashBoardController@index')->name('dashboard');
Route::get('push/send-push', 'Push\NotificationController@index')->name('page_push');
Route::post('push/send-push', 'Push\NotificationController@create')->name('send_push');
Route::get('push/subscribers', 'Push\SubscribersController@index')->name('push_subscribers');
Route::post('push/subscribers', 'Push\SubscribersController@count')->name('push_subscribers_count');
Route::get('push/statistics', 'Push\StatisticsController@index')->name('push_statistics');
Route::post('push/statistics', 'Push\StatisticsController@showMessage')->name('show_message');
Route::get('push/cron', 'Push\CronController@index')->name('push_cron');
Route::get('push/settings/profile', 'Push\Settings\MyProfileController@index')->name('my_profile_settings');
Route::get('push/settings/server', 'Push\Settings\MyServerController@index')->name('my_server_settings');
Route::post('push/settings/server', 'Push\Settings\MyServerController@create')->name('create_server');

/* todo:
 * Disable registration on the site
 * To remove, comment out the lines
 * */
Route::match(['post', 'get'], 'register', function () {
    Auth::logout();
    return redirect('/');
});