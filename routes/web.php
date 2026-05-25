<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/user/{id}', function ($id) {
    return ("User id is $id");
});

//optional slug

Route::get('post/{slug?}', function ($slug = 'default-slug') {
    return ("Post slug is $slug");
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test', function () {
    $url = route('dashboard');
    return "this url for dashboard is $url";
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "this is users page";
    });
    Route::get('/posts', function () {
        return "this is posts page";
    });
});

Route::get('/login', function () {
    return "login page";
})->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return "this is profile page";
    });
});

Route::get('/category', [CategoryController::class, 'index'])->name("category.list");

Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");
