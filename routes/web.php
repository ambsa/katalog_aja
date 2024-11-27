<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SearchController;

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

/// Rute untuk User yang Belum Login
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('show');


// Rute untuk User yang Sudah Login
Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/about', [UserController::class, 'about'])->name('user.about');
    Route::get('/user/services', [UserController::class, 'services'])->name('user.services');
    Route::get('/user/contact', [UserController::class, 'contact'])->name('user.contact');
});



// Route admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin hanya bisa mengakses route ini
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Category
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/category/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('admin/products/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');


    // Product
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');  
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');

 });

// Routes login page
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Routes register page
Route::middleware('guest')->group(function () {
    // Menampilkan halaman register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    // Proses registrasi
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Route untuk search
Route::get('/search', [SearchController::class, 'search'])->name('search');
