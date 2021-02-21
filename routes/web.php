<?php

use App\Http\Controllers\Absen\AbsenController;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dropout\DropoutController;
use App\Http\Controllers\General\SearchController;
use App\Http\Controllers\Graduation\GraduationController;
use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Kelas\KelasController;
use App\Http\Controllers\Keuangan\KeuanganController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Nilai\NilaiController;
use App\Http\Controllers\Nilai\RaporController;
use App\Http\Controllers\Pembayaran\PembayaranController;
use App\Http\Controllers\Siswa\SiswaController;
use App\Jobs\NaikKelas;
use App\Models\AdminConfirm;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

Route::group(["middleware" => "guest"], function() {
    Route::get('/', [AuthController::class, 'getLogin'])->name("login");
    Route::post('/', [AuthController::class, 'postLogin']);
});

Route::group(["middleware" => "auth"],function() {

        Route::get('/search', [SearchController::class, 'getStudent'])->name("searchStudent");

        Route::group(["prefix" => "admin"],function() {

            Route::group([],function() {
                Route::get('/', [AdminController::class, 'adminIndex'])->name("adminIndex");
                Route::get('/admins', [AdminController::class, 'getAdmins'])->name("adminGetAdmins");
                Route::get('/tambah', [AdminController::class, 'getPostAdmin'])->name("adminPostAdmin");
                Route::post('/tambah', [AdminController::class, 'postAdmin']);
                Route::get("/hapus/{admin:nik}", [AdminController::class,'deleteAdmin'])->name("adminDeleteAdmin");
                Route::get('/update/{admin:nik}', [AdminController::class, 'updateAdmin'])->name("adminUpdateAdmin");
                Route::put('/update/{admin:nik}', [AdminController::class,'updateeAdmin']);
            });

            Route::group(["prefix" => "siswa"],function() {
                // SiswaController
                Route::get("", [SiswaController::class,"getSiswa"])->name("adminDataSiswa");
                Route::get('/tambah', [SiswaController::class, "getAddSiswa"])->name("adminAddSiswa");
                Route::post('/tambah', [SiswaController::class, 'postAddSiswa']);
                Route::get('/delete/{student:user_id}', [SiswaController::class, 'deleteSiswa'])->name("adminDeleteSiswa");
                Route::get('/update/{student:user_id}', [SiswaController::class, 'updateSiswa'])->name("adminUpdateSiswa");
                Route::put('/update/{student:user_id}', [SiswaController::class, 'updateeSiswa']);
                Route::get('/naik-kelas', [SiswaController::class,'getNaikKelas'])->name("adminGetNaikKelas");
                Route::get('/naik-kelas/{class:class}', [SiswaController::class, 'getNaikKelasMember'])->name("adminGetNaikKelasMember");
                Route::put('/naik-kelas/exec', [SiswaController::class,'naikKelasExec'])->name("naikKelasExec");
                Route::put('/konfirmasi-naik-kelas', function() {
                    $percent = AdminConfirm::get()->count() / Student::get()->count() * 100 === 100;
                    if($percent) {
                        Alert::success("Berhasil", "Kenaikan Kelas Sudah Dikonfirmasi");
                        dispatch(new NaikKelas());
                    } else {
                        Alert::error("Error", "Aksi Ini Tidak Dapat Dilakukan");
                    }
                    return redirect()->back();
                })->name("konfirmasiNaikKelas");
                // SiswaController

                // GraduationController
                Route::get('/kelulusan', [GraduationController::class,'getKelulusan'])->name("adminGetKelulusan");
                Route::post('/kelulusan', [GraduationController::class,'postKelulusan'])->name('adminPostKelulusan');
                // GraduationController

                //DropoutController
                Route::get('/dropout', [DropoutController::class, 'getDropout'])->name("adminDropoutSiswa");
                Route::post('/dropout', [DropoutController::class, 'postDropout']);
                Route::get('/dropdout/siswa/{student:user_id}', [DropoutController::class,'formDropout'])->name("adminFormDropout");
                // DropoutController
            });

            Route::group(['prefix' => "guru"],function() {
                // GuruController
                Route::get('', [GuruController::class, "getGuru"])->name("adminGetGuru");
                Route::get('/tambah', [GuruController::class,'getAddGuru'])->name('adminAddGuru');
                Route::post('/tambah', [GuruController::class, 'postAddGuru']);
                Route::get("/delete/{teacher:user_id}", [GuruController::class, 'deleteGuru'])->name("adminDeleteGuru");
                Route::get('/update/{teacher:user_id}',[GuruController::class, 'updateGuru'])->name("adminUpdateGuru");
                Route::put('/update/{teacher:user_id}', [GuruController::class, 'updateeGuru']);
                // GuruController
            });

            Route::group(["prefix" => "keuangan"],function() {
                // KeuanganController
                Route::get('', [KeuanganController::class, 'getKeuangan'])->name("adminGetKeuangan");
                Route::get('/tambah', [KeuanganController::class, 'getAddKeuangan'])->name("adminAddKeuangan");
                Route::post('/tambah', [KeuanganController::class, 'postAddKeuangan']);
                Route::get('/delete/{finance:user_id}', [KeuanganController::class,"deleteKeuangan"])->name("adminDeleteFinance");
                Route::get('/update/{finance:user_id}', [KeuanganController::class, 'updateKeuangan'])->name("adminUpdateKeuangan");
                Route::put('/update/{finance:user_id}', [KeuanganController::class, 'updateeKeuangan']);
                // KeuanganController
            });

            Route::group(["prefix" => "arsip"],function() {
                // ArsipController
                Route::get('dropout', [ArsipController::class,"getArsipDropout"])->name("adminGetArsipDropout");
                Route::get('/dropout/siswa/{student:nisn}',
                [ArsipController::class, 'getDetailDropout'])->name("adminGetDetailDropout");
                Route::get('/graduation', [ArsipController::class, 'getArsipGraduation'])
                ->name("adminGetArsipGraduation");
                // ArsipController
            });

            Route::group(["prefix" => "kelas"],function() {
                // KelasController
                Route::get('', [KelasController::class, 'getKelas'])->name("adminGetKelas");
                Route::get('/tambah', [KelasController::class, 'getPostKelas'])
                ->name("adminGetPostKelas");
                Route::post('/tambah', [KelasController::class, 'postKelas']);
                Route::get('/member/{class:class}', [KelasController::class, 'getKelasMember'])->name("adminGetKelasMember");
                // KelasController
            });

            Route::group(["prefix" => "pembayaran"],function() {
                // PembayaranController
                Route::get('/setting', [PembayaranController::class,'settingPayment'])->name("adminSettingPayment");
                Route::post('/setting', [PembayaranController::class,'postSettingPayment']);
                Route::get('/settings', [PembayaranController::class,'getSettingPayment'])->name("getPaymentSetting");
                Route::get('/siswa', [PembayaranController::class,'getUserDebt'])->name("getUserDebt");
                Route::get('/bayar/siswa/{student:nis}',[PembayaranController::class, "formPayment"])->name("doPayment");
                Route::put('/bayar/siswa/{student:nis}', [PembayaranController::class, 'postPayment']);
                Route::get("/kwitansi", [PembayaranController::class, 'getUserReceipt'])->name("getUserReceipt");
                Route::get('/kwitansi/siswa/{student:nis}', [PembayaranController::class, 'getReceipt'])->name("getReceipt");
                // PembayaranController
            });

            Route::group(["prefix" => "laporan"],function() {
                // LaporanController
                Route::get('spp', [LaporanController::class, "getSppTotal"])->name("adminGetSppTotal");
                Route::get('spm', [LaporanController::class, 'getSpmTotal'])->name("adminGetSpmTotal");
                // LaporanController
            });

            Route::group(["prefix" => "absen"],function() {
                // AbsenController
                Route::get('', [AbsenController::class,'getAbsenKelas'])->name("adminGetAbsenKelas");
                Route::get("/kelas/{class:class}", [AbsenController::class,'getAbsenMember'])->name("adminGetAbsenKelasMember");
                Route::post("/kelas/{class:class}", [AbsenController::class, 'absen']);
                Route::get("/review", [AbsenController::class,'getPreview'])->name("adminGetPreviewAbsen");
                Route::get('/review/{class:class}/{guru:id}',[AbsenController::class,'getAbsen'])->name("adminGetAbsen");
                Route::put('/review/{class:class}/{guru}', [AbsenController::class,'editAbsen'])->name("adminEditAbsen");
                // AbsenController
            });

            Route::group(["prefix" => "nilai"],function() {
                // NilaiController
                Route::get('', [NilaiController::class, 'getKelasNilai'])->name("adminGetKelasNilai");
                Route::get('/{class:class}',[NilaiController::class,'getKelasMemberNilai'])->name("adminGetMemberKelasNilai");
                Route::get("/{class:class}/{student:user_id}", [NilaiController::class,'getInputNilai'])->name("adminInputNilai");
                Route::post("/{student:user_id}", [NilaiController::class,'postInputNilai'])->name("postAdminInputNilai");
                // NilaiController
            });

            Route::group(["prefix" => "view"],function() {
                // NilaiController
                Route::get('', [NilaiController::class,'viewNilaiKelas'])->name("adminViewNilaiKelas");
                Route::get("/{class:class}", [NilaiController::class,'getDetailNilai'])->name("adminViewDetailNilai");
                Route::get('/{class:class}/{student:user_id}',[NilaiController::class,'getNilaiDetail'])->name("adminGetNilaiDetail");
                // NilaiController
            });

            Route::group(["prefix" => "lihat"],function() {
                // NilaiController
                Route::get('/rapor', [NilaiController::class,'viewNilaiKelas'])->name("adminViewNilaiKelasRapor");
                Route::get("/{class:class}", [NilaiController::class,'getDetailNilai'])->name("adminViewDetailNilaiRapor");
                // NilaiController

                // AdminController
                Route::get('/{class:class}/{student:user_id}',[RaporController::class,'getNilaiDetailRapor'])->name("adminGetNilaiDetailRapor");
                // AdminController
            });

            Route::group(["prefix" => "rapor"],function() {
                // NilaiController
                Route::get('', [NilaiController::class, 'getKelasNilai'])->name("adminGetKelasNilaiRapor");
                Route::get('/{class:class}',[NilaiController::class,'getKelasMemberNilai'])->name("adminGetMemberKelasNilaiRapor");
                Route::get("/{class:class}/{student:user_id}", [NilaiController::class,'getInputNilai'])->name("adminInputNilaiRapor");
                // NilaiController

                // AdminController
                Route::post("/{student:user_id}", [RaporController::class,'postInputNilaiRapor'])->name("postAdminInputNilaiRapor");
                // AdminController
            });
        });

        Route::group(["prefix" => "guru"],function() {
            Route::get('', function() {
                return view("content.guru.index");
            })->name("guruIndex");

            Route::group(["prefix" => "absen"],function() {
                // AbsenController
                Route::get('', [AbsenController::class,'getAbsenKelas'])->name("guruGetAbsenKelas");
                Route::get("/kelas/{class:class}", [AbsenController::class,'getAbsenMember'])->name("guruGetAbsenKelasMember");
                Route::post("/kelas/{class:class}", [AbsenController::class, 'absen']);
                Route::get("/review", [AbsenController::class,'getPreview'])->name("guruGetPreviewAbsen");
                Route::get('/review/{class:class}/{guru:id}',[AbsenController::class,'getAbsen'])->name("guruGetAbsen");
                Route::put('/review/{class:class}/{guru}', [AbsenController::class,'editAbsen'])->name("guruEditAbsen");
                // AbsenController
            });

            Route::group(["prefix" => "nilai"],function() {
                // NilaiController
                Route::get('', [NilaiController::class, 'getKelasNilai'])->name("guruGetKelasNilai");
                Route::get('/{class:class}',[NilaiController::class,'getKelasMemberNilai'])->name("guruGetMemberKelasNilai");
                Route::get("/{class:class}/{student:user_id}", [NilaiController::class,'getInputNilai'])->name("guruInputNilai");
                Route::post("/{student:user_id}", [NilaiController::class,'postInputNilai'])->name("guruAdminInputNilai");
                // NilaiController
            });

            Route::group(["prefix" => "rapor"],function() {
                // NilaiController
                Route::get('', [NilaiController::class, 'getKelasNilai'])->name("guruGetKelasNilaiRapor");
                Route::get('/{class:class}',[NilaiController::class,'getKelasMemberNilai'])->name("guruGetMemberKelasNilaiRapor");
                Route::get("/{class:class}/{student:user_id}", [NilaiController::class,'getInputNilai'])->name("guruInputNilaiRapor");
                // NilaiController

                // RaporController
                Route::post("/{student:user_id}", [RaporController::class,'postInputNilaiRapor'])->name("postGuruInputNilaiRapor");
                // RaporController
            });

            Route::group(["prefix" => "view"],function() {
                // NilaiController
                Route::get('', [NilaiController::class,'viewNilaiKelas'])->name("guruViewNilaiKelas");
                Route::get("/{class:class}", [NilaiController::class,'getDetailNilai'])->name("guruViewDetailNilai");
                Route::get('/{class:class}/{student:user_id}',[NilaiController::class,'getNilaiDetail'])->name("guruGetNilaiDetail");
                // NilaiController
            });

            Route::group(["prefix" => "lihat"],function() {
                // NilaiController
                Route::get('/rapor', [NilaiController::class,'viewNilaiKelas'])->name("guruViewNilaiKelasRapor");
                Route::get("/{class:class}", [NilaiController::class,'getDetailNilai'])->name("guruViewDetailNilaiRapor");
                // NilaiController

                // RaporController
                Route::get('/{class:class}/{student:user_id}',[RaporController::class,'getNilaiDetailRapor'])->name("guruGetNilaiDetailRapor");
                // RaporController
            });

        });

        Route::group(["prefix" => "keuangan"],function() {
            Route::get('',function() {
                return view("content.keuangan.index");
            })->name("keuanganIndex");

            Route::group(["prefix" => "pembayaran"],function() {
                // PembayaranController
                Route::get('/setting', [PembayaranController::class,'settingPayment'])->name("keuanganSettingPayment");
                Route::post('/setting', [PembayaranController::class,'postSettingPayment']);
                Route::get('/settings', [PembayaranController::class,'getSettingPayment'])->name("getPaymentSetting");
                Route::get('/siswa', [PembayaranController::class,'getUserDebt'])->name("getUserDebt");
                Route::get('/bayar/siswa/{student:nis}',[PembayaranController::class, "formPayment"])->name("doPayment");
                Route::put('/bayar/siswa/{student:nis}', [PembayaranController::class, 'postPayment']);
                Route::get("/kwitansi", [PembayaranController::class, 'getUserReceipt'])->name("getUserReceipt");
                Route::get('/kwitansi/siswa/{student:nis}', [PembayaranController::class, 'getReceipt'])->name("getReceipt");
                // PembayaranController
            });

            Route::group(["prefix" => "laporan"],function() {
                // LaporanController
                Route::get('spp', [LaporanController::class, "getSppTotal"])->name("keuanganGetSppTotal");
                Route::get('spm', [LaporanController::class, 'getSpmTotal'])->name("keuanganGetSpmTotal");
                // LaporanController
            });
        });

        Route::group(["prefix" => "siswa"],function() {
            // SiswaController
            Route::get('/', [SiswaController::class,'getIndex'])->name("muridIndex");
            Route::get("/riwayat-pembayaran", [SiswaController::class,'getRiwayatPembayaran'])->name("riwayatPembayaran");
            Route::get("/riwayat-absen", [SiswaController::class, 'getRiwayatAbsen'])->name("riwayatAbsen");
            Route::get("/riwayat-nilai", [SiswaController::class, 'getRiwayatNilai'])->name("riwayatNilai");
            // SiswaController
        });

        Route::put('/update-password/{target:user_id}', [AuthController::class,'updatePassword'])->name("updatePassword");

        Route::get('/logout', function() {
            Auth::logout();
            return redirect()->route("login");
        })->name("logout");

});
