<?php

use App\Http\Controllers\ImageToVideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('image-to-video')->name('image-to-video.')->group(function () {
    Route::get('/', [ImageToVideoController::class, 'showGenerateVideoIdForm'])->name('index');
    Route::post('/', [ImageToVideoController::class, 'generateVideoId'])->name('generate');
    Route::get('/result', [ImageToVideoController::class, 'showGetVideoByIdForm'])->name('get-video-view');
    Route::post('/result', [ImageToVideoController::class, 'getVideoById'])->name('get-video');
});
