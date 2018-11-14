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
// Route::get('/');
Route::resource('/', 'HomeController');
Route::resource('home', 'HomeController');
Route::get('/impressum', 'HomeController@impressum')->name('impressum');
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

Route::resource('sets', 'SetsController');
Route::get('sets/filter/{filter?}', array(
    'as' => 'filter',
    'uses' => 'SetsController@index',
));
Route::resource('setsadmin', 'SetsadminController');

Route::resource('sound', 'SoundController');

Route::get('skills', 'SkillsController@index');
Route::get('skills/vita', 'SkillsController@vita')->middleware('auth');
Route::get('skills/person', 'SkillsController@person')->middleware('auth');
Route::resource('blog', 'BlogController');
Route::resource('kontakt', 'KontaktController');

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

Route::group([
    'prefix' => 'admin',
], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
