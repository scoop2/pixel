<?php

Route::redirect('/', '/desk/home');
Route::get('/admin', 'Admin\AdminController@index')->middleware('auth');
Route::post('/admin', 'Admin\AdminController@update')->middleware('auth');
Route::get('/admin/skills', 'Admin\AdminSkillsController@index')->middleware('auth');
Route::post('/admin/skills', 'Admin\AdminSkillsController@update')->middleware('auth');
Route::get('/admin/wg', 'Admin\AdminWgController@index')->middleware('auth');
Route::post('admin/wg', 'Admin\AdminWgController@update')->middleware('auth');
Route::post('admin/wg/insert', 'Admin\AdminWgController@insert')->middleware('auth');
Route::get('/admin/wg/delete/{id?}', 'Admin\AdminWgController@delete')->middleware('auth');
Route::get('/admin/sound', 'Admin\AdminSoundController@index')->middleware('auth');
Route::post('admin/sound', 'Admin\AdminSoundController@update')->middleware('auth');
Route::post('/admin/sound/insert', 'Admin\AdminSoundController@insert')->middleware('auth');
Route::get('/admin/sound/delete/{id?}', 'Admin\AdminSoundController@delete')->middleware('auth');

Route::redirect('/home', '/desk/home');
Route::get('{responsive?}/home', array(
    'as' => 'responsive',
    'uses' => 'HomeController@index',
));
/*
Route::get('/{responsive?}/impressum', array(
'as' => 'responsive',
'uses' => 'HomeController@impressum',
));
 */

Route::redirect('/festival', '/desk/festival');
Route::get('/{responsive?}/festival', array(
    'as' => 'responsive',
    'uses' => 'HomeController@festival',
));

Route::redirect('/sound', '/desk/sound');
Route::get('{responsive?}/sound', array(
    'as' => 'responsive',
    'uses' => 'SoundController@index',
));
Route::get('{responsive?}/sound/filter/{filter?}', array(
    'as' => 'filter',
    'uses' => 'SoundController@index',
));

Route::redirect('/skills', '/desk/skills');
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

Route::redirect('/kontakt', '/desk/kontakt');
Route::get('{responsive?}/kontakt', array(
    'as' => 'responsive',
    'uses' => 'KontaktController@index',
));

Route::get('{responsive?}/skills/vita/{pdf?}', 'SkillsController@vita')->middleware('auth');
Route::get('{responsive?}/skills/person/{pdf?}', 'SkillsController@person')->middleware('auth');
Route::get('{responsive?}/skills/pdf', 'SkillsController@completePdf')->middleware('auth');

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('{responsive?}/login', array(
    'as' => 'id',
    'uses' => 'Auth\LoginController@showLoginForm',
))->name('login');
Route::post('{responsive?}/login', array(
    'as' => 'id',
    'uses' => 'Auth\LoginController@login',
));
Route::post('{responsive?}/logout', array(
    'as' => 'id',
    'uses' => 'Auth\LoginController@logout',
))->name('logout');
Route::get('{responsive?}/login', array(
    'as' => 'id',
    'uses' => 'Auth\LoginController@logout',
))->name('login');

/*
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
 */

// Password Reset Routes...
/*
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
 */

Route::get('/blog', 'BlogController@index');

Route::get('{responsive?}/blog/{id?}', 'BlogController@index');
Route::redirect('/wg', '/desk/wg');
Route::get('{responsive?}/wg/{url?}', 'WgController@index');

Route::get('m3u/url/{url?}', 'M3uController@index');
Route::get('m3u/batch', 'M3uController@batchM3u')->middleware('auth');

Route::resource('test', 'TestController');

Route::get('{responsive?}/api/sets/list/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@sets',
));
Route::get('{responsive?}/api/sets/filter/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@filter',
));
Route::get('{responsive?}/api/sets/playlist/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@playlist',
));
Route::get('{responsive?}/api/clicks/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@click',
));
Route::get('{responsive?}/api/dl/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@dl',
));
Route::get('{responsive?}/api/play/{id?}', array(
    'as' => 'id',
    'uses' => 'ApiController@play',
));

Auth::routes();
