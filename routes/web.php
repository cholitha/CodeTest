<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ItemController::class,'viewAvailabeSellingProducts'])->name('item-list');// Items Route
Route::get('/login',[LoginController::class,'viewLogin'])->name('login.view');// Login View Route
Route::post('/login',[LoginController::class,'submitLogin'])->name('login.submit');//Login Button Submit
Route::get('/register',[RegisterController::class,'viewRegister'])->name('register.view');// Register View Route
Route::post('/register',[RegisterController::class,'registerUser'])->name('register.submit');//Create Users Route
Route::get('/logout',[LoginController::class,'logout'])->name('user.logout')->middleware('auth');
Route::post('/create-message',[TicketController::class,'createMessagetoSupplier']);
Route::get('/ticketstatus',[TicketController::class,'viewStatus']);// View Tiket status
Route::post('/ticketstatus',[TicketController::class,'getTicketDetails']);

Route::middleware(['auth','checkRole:Admin'])->group(function () {
    Route::get('/admin/dashboard',[DashboardController::class,'viewadmindashboard'])->name('admin.dashboard');//View Dashboard
});
Route::middleware(['auth','checkRole:Seller'])->group(function () {
    Route::get('/seller/dashboard',[DashboardController::class,'viewdashboard'])->name('seller.dashboard');//View Dashboard
});