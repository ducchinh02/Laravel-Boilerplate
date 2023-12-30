<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
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
});

Route::resource('photos', PhotoController::class);
