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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {

    $tags = \App\Tag::with(['artiles'])->get();
    dd($tags);

});

// route role
Route::group(['prefix' => 'role'], function () {
    Route::get('/', [
        'as' => 'role.list',
        'uses' => 'RoleController@index'
    ]);
});
// account route
Route::group(['prefix' => 'account'], function () {
    Route::get('/', [
        'as' => 'account.list',
        'uses' => 'AccountController@index'
    ]);
    Route::get('insert', [
        'as' => 'account.insert',
        'uses' => 'AccountController@insert'
    ]);
    Route::post('store', [
        'as' => 'account.store',
        'uses' => 'AccountController@store'
    ]);
});
// route user
Route::group(['prefix' => 'user'], function () {
    // route login
    Route::get('login', [
        'as' => 'get.login',
        'uses' => 'UserController@getLogin'
    ]);
    Route::post('login', [
        'as' => 'post.login',
        'uses' => 'UserController@postLogin'
    ]);
    // route register
    Route::get('register', [
        'as' => 'get.register',
        'uses' => 'UserController@getRegister'
    ]);
    Route::post('register', [
        'as' => 'post.register',
        'uses' => 'UserController@postRegister'
    ]);
    // logout
    Route::get('logout', [
        'as' => 'get.logout',
        'uses' => 'UserController@getLogout'
    ]);

});

Route::group(['middleware' => 'auth'], function () {
    // route category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [
            'as' => 'category.list',
            'uses' => 'CategoryController@index'
        ]);
        Route::post('add', [
            'as' => 'category.add',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::post('update/{id}', [
            'as' => 'category.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::get('delete/{id}', [
            'as' => 'category.delete',
            'uses' => 'CategoryController@delete'
        ]);
    });
    // route article
    Route::group(['prefix' => 'article'], function () {
            Route::get('/', [
                'as' => 'article.list',
                'uses' => 'ArticleController@index'
            ]);
            Route::get('add', [
                'as' => 'article.add',
                'uses' => 'ArticleController@create'
            ]);
            Route::post('store', [
                'as' => 'article.store',
                'uses' => 'ArticleController@store'
            ]);
            Route::get('edit/{id}', [
                'as' => 'article.edit',
                'uses' => 'ArticleController@edit'
            ]);
            Route::post('update/{id}', [
                'as' => 'article.update',
                'uses' => 'ArticleController@update'
            ]);
            Route::get('delete/{id}', [
                'as' => 'article.delete',
                'uses' => 'ArticleController@delete'
            ]);

        });
    // route tag
    Route::group(['prefix' => 'tag'], function () {
            Route::get('/', [
                'as' => 'tag.list',
                'uses' => 'TagController@index'
            ]);
            Route::post('store', [
                'as' => 'tag.store',
                'uses' => 'TagController@store'
            ]);
            Route::get('edit/{id}', [
                'as' => 'tag.edit',
                'uses' => 'TagController@edit'
            ]);
            Route::post('update/{id}', [
                'as' => 'tag.update',
                'uses' => 'TagController@update'
            ]);
            Route::get('delete/{id}', [
                'as' => 'tag.delete',
                'uses' => 'TagController@delete'
            ]);
        });
});