<?php

use App\Courses\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/new', [CourseController::class, 'create'])->name('courses.create');
    Route::get('courses/{course}', [CourseController::class, 'edit'])->name('courses.edit')
        ->middleware('can:edit posts');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::post('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::post('courses/{course}/publish', [CourseController::class, 'publish'])->name('courses.publish');
    Route::post('courses/{course}/delete', [CourseController::class, 'delete'])->name('courses.delete');
});
