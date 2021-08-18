<?php

use App\Assignments\Controllers\AssignmentController;
use App\Auth\Controllers\GoogleController;
use App\Courses\Controllers\CourseController;
use App\Invitations\Controllers\InvitationController;
use App\Mentors\Controllers\ManageMentorController;
use App\Mentors\Controllers\ManageMentorsController;
use App\Mentors\Controllers\MentorController;
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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /**
     * Courses
     */
    Route::get('courses', [CourseController::class, 'index'])
        ->name('courses.index');
    Route::get('courses/new', [CourseController::class, 'create'])
        ->name('courses.create')
        ->middleware('can:create courses');
    Route::get('courses/{course}', [CourseController::class, 'edit'])
        ->name('courses.edit')
        ->middleware('can:edit courses');
    Route::post('courses', [CourseController::class, 'store'])
        ->name('courses.store');
    Route::post('courses/{course}', [CourseController::class, 'update'])
        ->name('courses.update');
    Route::post('courses/{course}/publish', [CourseController::class, 'publish'])
        ->name('courses.publish');
    Route::post('courses/{course}/delete', [CourseController::class, 'delete'])
        ->name('courses.delete');

    /**
     * Assignments
     */
    Route::get('courses/{course}/assignments/new', [AssignmentController::class, 'create'])
        ->name('assignments.create')
        ->middleware('can:create assignments');
    Route::get('courses/{course}/{assignment}', [AssignmentController::class, 'edit'])
        ->name('assignments.edit')
        ->middleware('can:edit assignments');
    Route::post('courses/{course}/assignments', [AssignmentController::class, 'store'])
        ->name('assignments.store');
    Route::post('courses/{course}/{assignment}', [AssignmentController::class, 'update'])
        ->name('assignments.update');
    Route::post('courses/{course}/{assignment}/delete', [AssignmentController::class, 'delete'])
        ->name('assignments.delete');

    /**
     * Manage Mentors
     */
    Route::get('mentors', [ManageMentorsController::class, 'index'])
        ->name('mentors.index');
    Route::get('mentors/{mentor}', [ManageMentorsController::class, 'edit'])
        ->name('mentors.edit');
    Route::put('mentors/{mentor}', [ManageMentorsController::class, 'update'])
        ->name('mentors.update');
    Route::delete('mentors/{mentor}', [ManageMentorsController::class, 'delete'])
        ->name('mentors.delete');
    Route::post('mentors/{mentor}/courses', [ManageMentorsController::class, 'assignCourse'])
        ->name('mentors.assign-course');
    Route::post('mentors/{mentor}/mentees', [ManageMentorsController::class, 'assignMentee'])
        ->name('mentors.assign-mentee');

    /**
     * Invitations
     */
    Route::get('invitations/new/{role_name?}', [InvitationController::class, 'create'])
        ->name('invitations.create');
    Route::post('invitations/new', [InvitationController::class, 'store'])
        ->name('invitations.store');

    /**
     * Mentors
     */
    Route::get('mentor/courses', [MentorController::class, 'myCourses'])
        ->name('mentors.courses.index');
});
