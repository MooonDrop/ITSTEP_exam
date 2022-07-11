<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Psy\Command\EditCommand;

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


Route::group(['namespace' => 'App\Http\Controllers\Main'], function(){

    Route::get('/', IndexController::class);

});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function(){

    Route::group(['namespace' => 'Main'], function(){

        Route::get('/', IndexController::class)->name('personal.index');

    });

    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function(){

        Route::get('/', IndexController::class)->name('personal.like.index');
        Route::delete('/{post}', DeleteController::class)->name('personal.like.delete');
        
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function(){

        Route::get('/', IndexController::class)->name('personal.comment.index');
        Route::get('edit/{comment}', EditController::class)->name('personal.comment.edit');
        Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
        Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');

    });

});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function(){

    Route::group(['namespace' => 'Main'], function(){

        Route::get('/', IndexController::class)->name('admin.index');

    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function (){

        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('edit/{category}', EditController::class)->name('admin.category.edit');
        Route::patch('{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');

    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function (){

        Route::get('/', IndexController::class)->name('admin.tag.index');
        Route::get('/create', CreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('edit/{tag}', EditController::class)->name('admin.tag.edit');
        Route::patch('{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');

    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function (){

        Route::get('/', IndexController::class)->name('admin.post.index');
        Route::get('/create', CreateController::class)->name('admin.post.create');
        Route::post('/', StoreController::class)->name('admin.post.store');
        Route::get('/{post}', ShowController::class)->name('admin.post.show');
        Route::get('edit/{post}', EditController::class)->name('admin.post.edit');
        Route::patch('{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');

    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function (){

        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/create', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::get('edit/{user}', EditController::class)->name('admin.user.edit');
        Route::patch('{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
        
    });
});

      





Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
