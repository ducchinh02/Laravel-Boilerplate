<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\HomeMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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



Route::get('/', [HomeController::class, 'test']);
Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/uni-post', function () {
    print_r($_POST);
});

Route::get('/form', function () {
    $dataView = [
        'title' => 'Form title',
        'content' => 'Form content',
        'footer' => 'Form footer'
    ];
    return view('form', $dataView);
});

Route::prefix('admin')->middleware('auth.admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/user/{id}', function (Request $request, string $id) {
        dd($id);
    })->middleware('home:author');

    Route::get('/news/{slug}-{id}', function (Request $request, string $slug, string $id) {
        $content = 'News with : ';
        $content .= 'id = ' . $id . '<br/>';
        $content .= 'slug = ' . $slug . '<br/>';

        return $content;
    })->name('admin.news')->where(['slug' => '.+', 'id' => '[0-9]+']);
});
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.home');
    Route::get('/about', [BlogController::class, 'about'])->name('blog.about');
    Route::get('/detail/{slug}-{id}', [BlogController::class, 'detail'])->name('blog.detail')->where(['slug' => '.+', 'id' => '[0-9]+']);

    Route::middleware('blog.auth')->group(function () {
        // VIEWS
        Route::get('/add', [BlogController::class, 'add'])->name('blog.actions.add');
        Route::get('/edit/{slug}-{id}', [BlogController::class, 'edit'])->name('blog.actions.edit')->where(['slug' => '.+', 'id' => '[0-9]+']);
        // ACTIONS
        Route::post('/add', [BlogController::class, 'store']);
        Route::patch('/update', [BlogController::class, 'updatePost'])->name('blog.actions.update');
        Route::get('/delete/{slug}-{id}', [BlogController::class, 'delete'])->name('blog.actions.delete')->where(['slug' => '.+', 'id' => '[0-9]+']);
    });

    // AUTH
    Route::middleware('blog.not-auth')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::get('/signin', [BlogController::class, 'signin'])->name('blog.auth.signin');
            Route::get('/register', [BlogController::class, 'register'])->name('blog.auth.register');
            Route::post('/signin', [BlogController::class, 'handleSignIn']);
            Route::post('/register', [BlogController::class, 'handleRegister']);
        });
    });
    Route::get('/signout', [BlogController::class, 'handleSignOut'])->name('blog.auth.signout');

    // USERS
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('blog.users.list');
    });
});

Route::resource('photos', PhotoController::class);
