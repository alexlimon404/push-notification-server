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

//Push
Route::group(['prefix' => 'push'], function (){
    Route::get('send-push', 'Push\NotificationController@index')->name('page_push');
    Route::post('send-push', 'Push\NotificationController@create')->name('send_push');
    Route::get('subscribers', 'Push\SubscribersController@index')->name('push_subscribers');
    Route::post('subscribers', 'Push\SubscribersController@count')->name('push_subscribers_count');
    Route::get('statistics', 'Push\StatisticsController@index')->name('push_statistics');
    Route::post('statistics', 'Push\StatisticsController@showMessage')->name('show_message');
    Route::get('cron', 'Push\CronController@index')->name('push_cron');

    //Settings
    Route::group(['prefix' => 'settings'], function (){
        Route::get('profile', 'Push\Settings\MyProfileController@index')->name('my_profile_settings');
        Route::post('profile', 'Push\Settings\MyProfileController@changeEmailAndPass')->name('change_email_pass');
        Route::get('server', 'Push\Settings\MyServerController@index')->name('my_server_settings');
        Route::post('server', 'Push\Settings\MyServerController@create')->name('create_server');
        Route::get('api', 'Push\Settings\MyApiController@index')->name('my_api_settings');
        Route::post('api', 'Push\Settings\MyApiController@changeApi')->name('change_api');

    });
});

//Image page
Route::group(['prefix' => 'img'], function (){
    Route::get('', 'Image\MyImageController@index')->name('image_page');
    Route::get('upload', 'Image\UploadImageController@index')->name('upload_image_page');
    Route::post('upload', 'Image\UploadImageController@upload')->name('upload_image_file');

});

/* todo:
 * Disable registration on the site
 * To remove, comment out the lines
 * */
Route::match(['post', 'get'], 'register', function () {
    Auth::logout();
    return redirect('/');
});