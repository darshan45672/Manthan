<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HoDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::post('/user-dashboard/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/about',[HomeController::class,'about'])->name('about');

Route::get('/events',[EventController::class,'events'])->name('events');
Route::get('/events-details/{id}',[EventController::class, 'show'])->name('events.show');
Route::post('/event-register/{id}',[EventController::class, 'register'])->name('event.register')->middleware('auth');

Route::get('/gallery',[GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery-details/{id}',[GalleryController::class, 'show'])->name('gallery.show');

Route::get('/blogs',[BlogController::class,'index'])->name('blogs');
Route::get('/blogs-details/{id}',[BlogController::class,'show'])->name('blogs.show');

Route::get('/user-dashboard',[DashboardController::class,'index'])->name('user.dashboard')->middleware('auth');
Route::get('/user-dashboard/profile',[ProfileController::class,'viewProfile'])->name('user.view.profile')->middleware('auth');
Route::get('/user-dashboard/profile/edit',[ProfileController::class,'editProfile'])->name('user.edit.profile')->middleware('auth');

Route::get('/user-dashboard/events',[EventController::class,'viewEvents'])->name('user.view.events')->middleware('auth');
Route::get('/user-dashboard/my-events',[EventController::class,'myEvents'])->name('user.my.events')->middleware('auth');

Route::get('/user-dashboard/view-activities',[ActivityController::class,'index'])->name('user.activity.index')->middleware('auth');
Route::get('/user-dashboard/add-activity',[ActivityController::class,'create'])->name('user.activity.create')->middleware('auth');
Route::post('/user-dashboard/add-activity',[ActivityController::class,'store'])->name('user.activity.store')->middleware('auth');
Route::get('/user-dashboard/edit-activity/{id}',[ActivityController::class,'edit'])->name('user.activity.edit')->middleware('auth');
Route::post('/user-dashboard/update-activity/{id}',[ActivityController::class,'update'])->name('user.activity.update')->middleware('auth');
Route::post('/user-dashboard/delete-activity/{id}',[ActivityController::class,'destroy'])->name('user.activity.destroy')->middleware('auth');
Route::post('/user-dashboard/approve-activity/{id}/{status}',[ActivityController::class,'status'])->name('user.activity.status')->middleware('auth');

Route::get('/user-dashboard/my-testimonials',[TestimonialController::class,'index'])->name('user.testimonials')->middleware('auth');
Route::get('/user-dashboard/add-testimonial',[TestimonialController::class,'create'])->name('user.testimonial.create')->middleware('auth');
Route::post('/user-dashboard/add-testimonial',[TestimonialController::class,'store'])->name('user.testimonial.store')->middleware('auth');
Route::get('/user-dashboard/edit-testimonial',[TestimonialController::class,'edit'])->name('user.testimonial.edit')->middleware('auth');
Route::post('/user-dashboard/update-testimonial/{id}',[TestimonialController::class,'update'])->name('user.testimonial.update')->middleware('auth');
Route::post('/user-dashboard/delete-testimonial/{id}',[TestimonialController::class,'destroy'])->name('user.testimonial.destroy')->middleware('auth');

Route::get('/user-dashboard/students',[StudentController::class,'index'])->name('user.students')->middleware('auth');
Route::get('/user-dashboard/add-students',[StudentController::class,'create'])->name('user.students.create')->middleware('auth');
Route::post('/user-dashboard/add-student',[StudentController::class,'store'])->name('user.students.store')->middleware('auth');

Route::get('/user-dashboard/faculty',[FacultyController::class,'index'])->name('user.faculty')->middleware('auth');
Route::get('/user-dashboard/add-faculty',[FacultyController::class,'create'])->name('user.faculty.create')->middleware('auth');
Route::post('/user-dashboard/add-faculty',[FacultyController::class,'store'])->name('user.faculty.store')->middleware('auth');
Route::post('/user-dashboard/delete-faculty/{id}',[FacultyController::class,'destroy'])->name('user.faculty.destroy')->middleware('auth');

Route::get('/user-dashboard/hod',[HoDController::class,'index'])->name('user.hod')->middleware('auth');
Route::get('/user-dashboard/add-hod',[HoDController::class,'create'])->name('user.hod.create')->middleware('auth');
Route::post('/user-dashboard/add-hod',[HoDController::class,'store'])->name('user.hod.store')->middleware('auth');

// Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
// Route::get('auth/google-callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');
// Route::get('auth/github', [SocialiteController::class, 'redirectToGitHub'])->name('github.login');
// Route::get('auth/github-callback', [SocialiteController::class, 'handleGithubCallback'])->name('github.callback');

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider'])->name('social.login');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])->name('social.callback');


require __DIR__.'/auth.php';