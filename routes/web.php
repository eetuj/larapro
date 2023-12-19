<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ScoutController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AudienceController;
use App\Http\Controllers\EnrollmentController;
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
})->name('main');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//Midlewre RoleAuth
//first to check if logged in with auth
//then add roleauth middleware to check the rolefor the role

//--------------------------------Admin---------------------------------
Route::middleware(['auth', 'auth.role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('adminDashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});
//end group admin middleware
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


//-------------------------------Scout---------------------------------

Route::middleware(['auth', 'auth.role:scout'])->group(function () {
    Route::get('/scout/dashboard', [ScoutController::class, 'ScoutDashboard'])->name('ScoutDashboard');
    Route::get('/scout/profile', [ScoutController::class, 'ScoutProfile'])->name('scout.profile');
    Route::post('/scout/profile/store', [ScoutController::class, 'ScoutProfileStore'])->name('scout.profile.store');
    Route::get('/scout/change/password', [ScoutController::class, 'ScoutChangePassword'])->name('scout.change.password');
    Route::post('/scout/update/password', [ScoutController::class, 'ScoutUpdatePassword'])->name('scout.update.password');
    //Scouts Extra.. To be middlewared
    Route::post('/scout/dashboard/{event}/enroll', [EnrollmentController::class, 'enroll'])->name('event.enroll');
    Route::get('/scout/my-parents', [ScoutController::class, 'myParents'])->name('scout.myParents');
    Route::get('/scout/add-parent', [ScoutController::class, 'AddParent'])->name('scout.addParent');
    Route::post('/scout/add-parent/link', [ScoutController::class, 'linkParent'])->name('scout.linkParent');
    Route::delete('/scout/my-parents/{parent}', [ScoutController::class, 'unlinkParent'])->name('scout.unlinkParent');
});
//end group scout middleware
Route::get('/scout/logout', [ScoutController::class, 'scoutLogout'])->name('scout.logout');


//-------------------------------Parent---------------------------------
Route::middleware(['auth', 'auth.role:parent'])->group(function () {
    //Parents Extra.. To be middlewared
    Route::get('/parent/my-child', [ParentController::class, 'myChild'])->name('parent.myChild');
    Route::get('/parent/add-child', [ParentController::class, 'addChild'])->name('parent.addChild');
    Route::post('/parent/add-child/link', [ParentController::class, 'linkChild'])->name('parent.linkChild');
    Route::delete('/parent/my-child/{scout}', [ParentController::class, 'unlinkChild'])->name('parent.unlinkChild');
});
//end group parent middleware
Route::get('/parent/dashboard', [ParentController::class, 'ParentDashboard'])->name('ParentDashboard');



//-------------------------------Events---------------------------------
Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::middleware('auth')->group(function () {
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{event}/update', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{event}/delete', [EventController::class, 'delete'])->name('event.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes/web.php

Route::post('/scout/unenroll/{event}', [EnrollmentController::class, 'unenroll'])->name('scout.unenroll');


Route::get('/supportMemeber',  [EnrollmentController::class, 'support'])->name('support.attend');
Route::post('/buyTickets', [AudienceController::class, 'storeNbuy'])->name('storeNbuy');
Route::get('/search', [EventController::class, 'searchEvents'])->name('search.events');


// my child view
Route::get('/scout/enrollments/{scout}', [ScoutController::class, 'viewEnrollments'])->name('scout.viewEnrollments');

//common auth
Route::get('/scout/my-enrollments', [EnrollmentController::class, 'myEnrollments'])->name('scout.myenrollments');

Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

