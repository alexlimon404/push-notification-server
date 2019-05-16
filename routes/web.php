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
Route::get('dashboard/push', 'Push\NotificationController@index')->name('push');
Route::post('dashboard/make-push', 'Push\NotificationController@makePush');
Route::get('dashboard/push/statistics', 'Push\StatisticsController@index')->name('push_statistics');
Route::get('dashboard/push/cron', 'Push\CronController@index')->name('push_cron');
Route::get('dashboard/push/setting', 'Push\SettingController@index')->name('push_setting');


/*
 * Disable registration on the site
 * To remove, comment out the lines
 * */
Route::match(['post', 'get'], 'register', function () {
    Auth::logout();
    return redirect('/');
});