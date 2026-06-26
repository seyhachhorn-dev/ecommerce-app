<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;

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



//Route::resource('/product',ProductController::class);

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');

//employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

//Frontend

Route::get('/',[FrontendController::class,'index']);

Route::get('/list',[FrontendController::class,'list']);
Route::get('/show/{id}',[FrontendController::class,'show']);