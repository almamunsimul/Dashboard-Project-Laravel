<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BkashController;
use App\Http\Controllers\Admin\RecycleController;
use App\Http\Controllers\Admin\SocialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Banner Part
    Route::get('/dashboard/banner/all', [BannerController::class, 'all'])->name('banner.all');
    Route::get('/dashboard/banner/add', [BannerController::class, 'add'])->name('banner.add');
    Route::get('/dashboard/banner/view/{slug}', [BannerController::class, 'view'])->name('banner.view');
    Route::get('/dashboard/banner/edit/{slug}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/dashboard/banner/add/insert', [BannerController::class, 'insert'])->name('banner.insert');
    Route::post('/dashboard/banner/update', [BannerController::class, 'update'])->name('banner.update');
    //dompdf Routes
    Route::get('/dashboard/banner/print', [BannerController::class, 'pdfDownload'])->name('banner.print');
    Route::get('/dashboard/banner/print/individual/{slug}', [BannerController::class, 'pdfDownloadIndividual'])->name('banner.printi');
    //for excel export
    Route::get('/dashboard/banner/excel', [BannerController::class, 'printExcel'])->name('banner.excel');
    //for excel Import    
    Route::post('/dashboard/banner/excel/upload', [BannerController::class, 'uploadExcel'])->name('banner.excelUpload');
    
    // Delete Data Directly
    // Route::post('/dashboard/banner/delete/{slug}', [BannerController::class, 'delete'])->name('banner.delete');
    
    //Payment Route
    Route::get('/dashboard/payment', [BkashController::class, 'index'])->name('payment.view');
    Route::post('/bkash/create', [BkashController::class, 'create'])->name('bkash.create');
    Route::get('/bkash/callback', [BkashController::class, 'callback'])->name('bkash.callback');
    Route::get('/bkash/success', [BkashController::class, 'success'])->name('bkash.success');
    
    
    Route::middleware('role:1,2')->group(function () {
        
        //User Part
        Route::get('/dashboard/users/all', [UserController::class, 'all'])->name('user.all');
        Route::get('/dashboard/users/add', [UserController::class, 'add'])->name('user.add');
        Route::get('/dashboard/users/view', [UserController::class, 'view'])->name('user.view');
        Route::get('/dashboard/users/edit', [UserController::class, 'edit'])->name('user.edit');


        Route::post('/dashboard/banner/delete/softdelete', [BannerController::class, 'softdelete'])->name('banner.softdelete');
        Route::get('/dashboard/banner/recycle/all', [RecycleController::class, 'all'])->name('banner.recycle.all');
        
        Route::post('/dashboard/banner/recycle/restore', [RecycleController::class, 'restore'])->name('banner.restore');
        Route::post('/dashboard/banner/recycle/delete', [RecycleController::class, 'delete'])->name('banner.delete');

        
    });
    
});


Route::controller(SocialController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth-google-callback');
});


require __DIR__ . '/auth.php';
