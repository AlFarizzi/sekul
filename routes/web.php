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
        Route::get('/admins', [AdminController::class, 'getAdmins'])->name("adminGetAdmins");
        Route::get('/tambah', [AdminController::class, 'getPostAdmin'])->name("adminPostAdmin");
        Route::post('/tambah', [AdminController::class, 'postAdmin']);
        Route::get("/hapus/{admin:nik}", [AdminController::class,'deleteAdmin'])->name("adminDeleteAdmin");
        Route::get('/update/{admin:nik}', [AdminController::class, 'updateAdmin'])->name("adminUpdateAdmin");
        Route::put('/update/{admin:nik}', [AdminController::class,'updateeAdmin']);

        Route::group(["prefix" => "siswa"],function() {
            Route::get("", [AdminController::class,"getSiswa"])->name("adminDataSiswa");
            Route::get('/tambah', [AdminController::class, "getAddSiswa"])->name("adminAddSiswa");
            Route::post('/tambah', [AdminController::class, 'postAddSiswa']);
            Route::get('/delete/{student:user_id}', [AdminController::class, 'deleteSiswa'])->name("adminDeleteSiswa");
            Route::get('/update/{student:user_id}', [AdminController::class, 'updateSiswa'])->name("adminUpdateSiswa");
            Route::put('/update/{student:user_id}', [AdminController::class, 'updateeSiswa']);
            Route::get('/kelulusan', [AdminController::class,'getKelulusan'])->name("adminGetKelulusan");
            Route::post('/kelulusan', [AdminController::class,'postKelulusan'])->name('adminPostKelulusan');
            Route::get('/dropout', [AdminController::class, 'getDropout'])->name("adminDropoutSiswa");
            Route::get('/dropdout/siswa/{student:user_id}', [AdminController::class,'formDropout'])->name("adminFormDropout");
            Route::post('/dropout', [AdminController::class, 'postDropout']);
        });

        Route::group(['prefix' => "guru"],function() {
            Route::get('', [AdminController::class, "getGuru"])->name("adminGetGuru");
            Route::get('/tambah', [AdminController::class,'getAddGuru'])->name('adminAddGuru');
            Route::post('/tambah', [AdminController::class, 'postAddGuru']);
            Route::get("/delete/{teacher:user_id}", [AdminController::class, 'deleteGuru'])->name("adminDeleteGuru");
            Route::get('/update/{teacher:user_id}',[AdminController::class, 'updateGuru'])->name("adminUpdateGuru");
            Route::put('/update/{teacher:user_id}', [AdminController::class, 'updateeGuru']);
        });

        Route::group(["prefix" => "keuangan"],function() {
            Route::get('', [AdminController::class, 'getKeuangan'])->name("adminGetKeuangan");
            Route::get('/tambah', [AdminController::class, 'getAddKeuangan'])->name("adminAddKeuangan");
            Route::post('/tambah', [AdminController::class, 'postAddKeuangan']);
            Route::get('/delete/{finance:user_id}', [AdminController::class,"deleteKeuangan"])->name("adminDeleteFinance");
            Route::get('/update/{finance:user_id}', [AdminController::class, 'updateKeuangan'])->name("adminUpdateKeuangan");
            Route::put('/update/{finance:user_id}', [AdminController::class, 'updateeKeuangan']);
        });

        Route::group(["prefix" => "arsip"],function() {
            Route::get('dropout', [AdminController::class,"getArsipDropout"])->name("adminGetArsipDropout");
            Route::get('/dropout/siswa/{student:nisn}',
            [AdminController::class, 'getDetailDropout'])->name("adminGetDetailDropout");
            Route::get('/graduation', [AdminController::class, 'getArsipGraduation'])
            ->name("adminGetArsipGraduation");
        });

        Route::group(["prefix" => "kelas"],function() {
            Route::get('', [AdminController::class, 'getKelas'])->name("adminGetKelas");
            Route::get('/tambah', [AdminController::class, 'getPostKelas'])
            ->name("adminGetPostKelas");
            Route::post('/tambah', [AdminController::class, 'postKelas']);
            Route::get('/member/{class:class}', [AdminController::class, 'getKelasMember'])->name("adminGetKelasMember");
        });

    });

    Route::get('/search', [SearchController::class, 'getStudent'])->name("searchStudent");

    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route("login");
    });

});
