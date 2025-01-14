<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NavController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TabunganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::group(['middleware' => ['role:admin|kepala sekolah']], function () {
    Route::get('/siswa/{nis}', function ($nis) {
        return App\Models\Siswa::with('kelas')->find($nis);
    });
    Route::get('/dashboard', [DashboardController::class, 'dailyTabunganChart'])->name('dashboard');
    Route::get('/pengelolaan-siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/pengelolaan-siswa/tambah-siswa', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/pengelolaan-siswa/edit-siswa/{nis}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::match(['put', 'patch'], '/update/{nis}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/delete/{nis}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/siswa/{nis}', [SiswaController::class, 'show'])->name('siswa.show');

    //tabungan
    Route::get('/kelola-tabungan/kelas/{kelas}', [TabunganController::class, 'showKelas'])->name('tabungan.kelas');
    Route::get('/kelola-tabungan/riwayat/{kelas}/{id}', [TabunganController::class, 'riwayat'])->name('tabungan.riwayat');
    Route::get('/kelola-tabungan/setor/{kelas}/{id}', [TabunganController::class, 'setor'])->name('tabungan.setor');
    Route::get('/kelola-tabungan/tarik/{kelas}/{id}', [TabunganController::class, 'tarik'])->name('tabungan.tarik');
    Route::post('/kelola-tabungan/store', [TabunganController::class, 'store_setor'])->name('tabungan.store');
    Route::post('/kelola-tabungan/store-tarik', [TabunganController::class, 'store_tarik'])->name('tabungan.store_tarik');

    //print
    Route::get('/Laporan-Keseluruhan', [TabunganController::class, 'laporanKeseluruhan'])->name('laporan.keseluruhan');
    Route::get('/siswas/prints', [PdfController::class, 'siswaPrint'])->name('pdf.siswaPrint');
    Route::get('/keseluruhans/prints', [PdfController::class, 'keseluruhanPrint'])->name('pdf.keseluruhanPrint');
    Route::get('/siswas/prints/kelas/{kelas}', [PdfController::class, 'kelasPrint'])->name('pdf.kelasPrint');
    Route::get('/siswas/prints/perorang/{id}', [PdfController::class, 'riwayatPrint'])->name('pdf.riwayatPrint');

});

Route::group(['middleware' => ['role:admin|kepala sekolah|siswa']], function () {
    
    Route::get('/dashboard', [DashboardController::class, 'dailyTabunganChart'])->name('dashboard');

    //print
    Route::get('/siswas/prints/perorang/{id}', [PdfController::class, 'riwayatPrint'])->name('pdf.riwayatPrint');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

