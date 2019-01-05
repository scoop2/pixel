<?php
/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::redirect('/', '/desk/home');
Route::get('{responsive?}/home', array(
    'as' => 'responsive',
    'uses' => 'HomeController@index',
));
Route::get('/{responsive?}/impressum', array(
    'as' => 'responsive',
    'uses' => 'HomeController@impressum',
));
Route::get('/{responsive?}/festival', array(
    'as' => 'responsive',
    'uses' => 'HomeController@festival',
));
Route::get('/{responsive?}/sound', array(
    'as' => 'responsive',
    'uses' => 'SoundController@index',
));
Route::get('{responsive?}/sound', array(
    'as' => 'responsive',
    'uses' => 'SoundController@index',
));
Route::get('{responsive?}/sound/filter/{filter?}', array(
    'as' => 'filter',
    'uses' => 'SoundController@index',
));
Route::get('{responsive?}/skills', array(
    'as' => 'responsive',
    'uses' => 'SkillsController@index',
));
Route::get('{responsive?}/skills/vita', array(
    'as' => 'responsive',
    'uses' => 'SkillsController@vita',
))->middleware('auth');
Route::get('{responsive?}/skills/person', array(
    'as' => 'responsive',
    'uses' => 'SkillsController@person',
))->middleware('auth');
Route::get('{responsive?}/kontakt', array(
    'as' => 'responsive',
    'uses' => 'KontaktController@index',
));

Route::get('/admin', 'Admin\AdminController@index')->middleware('auth');
Route::post('/admin', 'Admin\AdminController@update')->middleware('auth');
Route::get('/admin/skills', 'Admin\AdminSkillsController@index')->middleware('auth');
Route::post('/admin/skills', 'Admin\AdminSkillsController@update')->middleware('auth');
Route::get('/admin/sound', 'Admin\AdminSoundController@index')->middleware('auth');
Route::post('/admin/sound', 'Admin\AdminSoundController@update')->middleware('auth');
Route::post('/admin/sound/insert', 'Admin\AdminSoundController@insert')->middleware('auth');
Route::get('/admin/sound/delete/{id?}', array(
    'as' => 'id',
    'uses' => 'Admin\AdminSoundController@delete',
));

#
//Route::get('login', array('uses' => 'HomeController@showLogin'));
//Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::resource('setsadmin', 'SetsadminController');

Route::get('m3u/url/{url?}', 'M3uController@index');
Route::get('m3u/batch', 'M3uController@batchM3u')->middleware('auth');

Route::resource('test', 'TestController');

/*
Route::get('wg/{id?}', array(
'as' => 'id',
'uses' => 'WgController@index'
));
 */

Route::get('api/sets/list/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@sets',
));
Route::get('api/sets/filter/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@filter',
));
Route::get('api/sets/playlist/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@playlist',
));
Route::resource('/cruds', 'CrudsController', [
    'except' => ['edit', 'show', 'store'],
]);
Route::get('api/clicks/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@click',
));

Auth::routes();
