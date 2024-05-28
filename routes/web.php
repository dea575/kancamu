<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\ResultController as AdminResultController;
use App\Http\Controllers\Admin\PsychologistController as AdminPsychologistController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\MoodController;
use App\Http\Controllers\User\TestController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('article/{article}', [HomeController::class, 'article'])->name('article');
Route::get('depression', [HomeController::class, 'depression'])->name('depression');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');

Auth::routes();


Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
    Route::put('profile/update', [HomeController::class, 'profileUpdate'])->name('profile.update');

    Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
        Route::get('/get-result', [AdminHomeController::class, 'getResult'])->name('get-result');
        Route::get('/get-mood', [AdminHomeController::class, 'getMood'])->name('get-mood');

        Route::resource('result', AdminResultController::class);
        Route::resource('question', AdminQuestionController::class);
        Route::resource('psychologist', AdminPsychologistController::class);
        Route::resource('article', AdminArticleController::class);
        Route::get('user/test/{test}', [AdminUserController::class, 'test'])->name('user.test');
        Route::get('user/mood/{user}', [AdminUserController::class, 'mood'])->name('user.mood');
        Route::resource('user', AdminUserController::class);
    });

    Route::get('test/print/{test}', [TestController::class, 'print'])->name('test.print');
    Route::resource('test', TestController::class);
    Route::get('mood/getMood', [MoodController::class, 'getMood'])->name('mood.getMood');
    Route::resource('mood', MoodController::class);
});


