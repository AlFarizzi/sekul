<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\General\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "guest"], function() {
    Route::get('/', [AuthController::class, 'getLogin'])->name("login");
    Route::post('/', [AuthController::class, 'postLogin']);
});

Route::group(["middleware" => "auth"],function() {
    Route::group(["prefix" => "admin"],function() {
        Route::get('/', [AdminController::class, 'adminIndex'])->name("adminIndex");
        Route::group(["prefix" => "siswa"],function() {
            Route::get("", [AdminController::class,"getSiswa"])->name("adminDataSiswa");
            Route::get('/tambah', [AdminController::class, "getAddSiswa"])->name("adminAddSiswa");
            Route::post('/tambah', [AdminController::class, 'postAddSiswa']);
            Route::get('/delete/{student:user_id}', [AdminController::class, 'deleteSiswa'])->name("adminDeleteSiswa");
            Route::get('/update/{student:user_id}', [AdminController::class, 'updateSiswa'])->name("adminUpdateSiswa");
            Route::put('/update/{student:user_id}', [AdminController::class, 'updateeSiswa']);
        });
        Route::group(['prefix' => "guru"],function() {
            Route::get('', [AdminController::class, "getGuru"])->name("adminGetGuru");
            Route::get('/tambah', [AdminController::class,'getAddGuru'])->name('adminAddGuru');
            Route::post('/tambah', [AdminController::class, 'postAddGuru']);
        });
    });
    Route::get('/search', [SearchController::class, 'getStudent'])->name("searchStudent");
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route("login");
    });
});
