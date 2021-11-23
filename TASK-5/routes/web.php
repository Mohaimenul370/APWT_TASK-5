<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\ServerWatchDogController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\SubZoneController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;


/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| General Routes for all user
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {return view('login');})->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/login',[LoginController::class,'login']);
Route::get('/register', function () {return view('register');})->name('register');
Route::post('/register', [RegistrationController::class,'store'])->name('registration');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Hotspot routes
|--------------------------------------------------------------------------
*/

Route::prefix('hotspot')->name('hotspot.')->group(function () {
    Route::get('/users', [RouterController::class, 'hotspotUsers'])->name('users');
    Route::get('/active', [RouterController::class, 'hotspotActiveUsers'])->name('active');
    Route::get('/online', [RouterController::class, 'hotspotOnlineUsers'])->name('online');
    Route::get('/online/remove/{serverId}/{userId}', [RouterController::class, 'hotspotOnlineUsersRemove'])->where('serverId', '[0-9]+');
    Route::get('/profiles', [RouterController::class, 'hotspotProfiles'])->name('profiles');
    Route::get('/profiles/remove/{serverId}/{packageName}', [RouterController::class, 'hotspotProfilesRemove'])->where('serverId', '[0-9]+');
    Route::get('/log', [RouterController::class, 'hotspotLog'])->name('log');
    Route::get('/mac-log', [RouterController::class, 'hotspotMacLog'])->name('mac-log');
    Route::get('/change-log', [RouterController::class, 'hotspotChangeLog'])->name('change-log');
    Route::get('/dhcp-leases', [RouterController::class, 'dhcpLeases'])->name('dhcp-leases');
});


/*
|--------------------------------------------------------------------------
| PPPoE Routes
|--------------------------------------------------------------------------
*/


Route::prefix('pppoe')->name('pppoe.')->group(function () {
    Route::get('/users', [RouterController::class, 'pppoeUsers'])->name('users');
    Route::get('/active', [RouterController::class, 'pppoeActiveUsers'])->name('active');
    Route::get('/online', [RouterController::class, 'pppoeOnlineUsers'])->name('online');
    Route::get('/online/remove/{serverId}/{userId}', [RouterController::class, 'pppoeOnlineUsersRemove'])->where('serverId', '[0-9]+');
    Route::get('/profiles', [RouterController::class, 'pppoeProfiles'])->name('profiles');
    Route::get('/profiles/remove/{serverId}/{packageName}', [RouterController::class, 'pppoeProfilesRemove'])->where('serverId', '[0-9]+');
    Route::get('/log', [RouterController::class, 'pppoeLog'])->name('log');
    Route::get('/mac-log', [RouterController::class, 'pppoeMacLog'])->name('mac-log');
    Route::get('/change-log', [RouterController::class, 'pppoeChangeLog'])->name('change-log');
    Route::get('/traffic-monitor', [RouterController::class, 'pppoeTrafficMonitor'])->name('traffic-monitor');
});


/*
|--------------------------------------------------------------------------
| Mikrorik Server Routes
|--------------------------------------------------------------------------
*/


Route::prefix('server')->name('server.')->group(function () {
    Route::get('/', [ServerController::class, 'index'])->name('index');
    Route::post('/', [ServerController::class, 'store']);
    Route::get('/delete/{id}', [ServerController::class, 'destroy']);
    Route::get('/edit/{id}', [ServerController::class, 'edit']);
    Route::post('/edit/{id}', [ServerController::class, 'update']);
});


/*
|--------------------------------------------------------------------------
| Server Watch Dog Routes
|--------------------------------------------------------------------------
*/


Route::prefix('watchdog')->name('watchdog.')->group(function () {
    Route::get('/', [ServerWatchDogController::class, 'list'])->name('index');
    Route::post('/', [ServerWatchDogController::class, 'store']);
    Route::get('/delete/{id}', [ServerWatchDogController::class, 'delete']);
    Route::get('/edit/{id}', [ServerWatchDogController::class, 'edit']);
    Route::post('/edit/{id}', [ServerWatchDogController::class, 'update']);
});


/*
|--------------------------------------------------------------------------
| Zone Routes
|--------------------------------------------------------------------------
*/

Route::prefix('zone')->name('zone.')->group(function () {
    Route::get('/', [ZoneController::class, 'index'])->name('index');
    Route::post('/', [ZoneController::class, 'store']);
    Route::get('/delete/{id}', [ZoneController::class, 'delete']);
    Route::get('/edit/{id}', [ZoneController::class, 'edit']);
    Route::post('/edit/{id}', [ZoneController::class, 'update']);
});



/*
|--------------------------------------------------------------------------
| Sub Zone Routes
|--------------------------------------------------------------------------
*/

Route::prefix('sub-zone')->name('sub-zone.')->group(function () {
    Route::get('/', [SubZoneController::class, 'index'])->name('index');
    Route::post('/', [SubZoneController::class, 'store']);
    Route::get('/delete/{id}', [SubZoneController::class, 'delete']);
    Route::get('/edit/{id}', [SubZoneController::class, 'edit']);
    Route::post('/edit/{id}', [SubZoneController::class, 'update']);
});



/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
*/

Route::prefix('company')->name('company.')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('index');
    Route::post('/', [CompanyController::class, 'store']);
    Route::get('/delete/{id}', [CompanyController::class, 'delete']);
    Route::get('/edit/{id}', [CompanyController::class, 'edit']);
    Route::post('/edit/{id}', [CompanyController::class, 'update']);
    Route::get('/export/Pdf', [CompanyController::class, 'export'])->name('export');
});



/*
|--------------------------------------------------------------------------
| UserRoutes
|--------------------------------------------------------------------------
*/

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/dash', [UserController::class, 'dash'])->name('dash');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/', [UserController::class, 'store']);
    Route::get('/delete/{id}', [UserController::class, 'delete']);
    Route::get('/edit', [UserController::class, 'edit']);
    Route::post('/edit', [UserController::class, 'update']);
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin/user')->name('admin.user.')->group(function () {
    Route::get('/', [AdminController::class, 'userlist'])->name('index');
    Route::post('/', [AdminController::class, 'userlist']);
    Route::get('/edit/{userId}', [AdminController::class, 'edit']);
    Route::get('/delete/{userId}', [AdminController::class, 'destroy']);
    Route::post('/edit/{id}', [AdminController::class, 'update']);
});


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [DashboardController::class, 'index'])->name('home');





Route::post('/', [ProductController::class, 'store'])->name('product.add');
Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/edit/{id}', [ProductController::class, 'edit']);
Route::post('/edit', [ProductController::class, 'update'])->name('product.edit');
Route::get('/view/{id}', [ProductController::class, 'view'])->name('product.view');
Route::get('/contact-us', function () {return view('pages.contact-us');})->name('contact-us');





Route::get('/product/delete/{id}', [ProductController::class, 'delete']);






