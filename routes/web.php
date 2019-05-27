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
Route::get('dashboard/push/send-push', 'Push\NotificationController@index')->name('page_push');
Route::post('dashboard/push/send-push', 'Push\NotificationController@create')->name('send_push');
Route::get('dashboard/push/subscribers', 'Push\SubscribersController@index')->name('push_subscribers');
Route::post('dashboard/push/subscribers', 'Push\SubscribersController@count')->name('push_subscribers_count');
Route::get('dashboard/push/statistics', 'Push\StatisticsController@index')->name('push_statistics');
Route::get('dashboard/push/cron', 'Push\CronController@index')->name('push_cron');
Route::get('dashboard/push/settings/profile', 'Push\Settings\MyProfileController@index')->name('my_profile_settings');
Route::get('dashboard/push/settings/server', 'Push\Settings\MyServerController@index')->name('my_server_settings');

/* todo:
 * Disable registration on the site
 * To remove, comment out the lines
 * */
Route::match(['post', 'get'], 'register', function () {
    Auth::logout();
    return redirect('/');
});