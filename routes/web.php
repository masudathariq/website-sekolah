<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\HeroImageController;
use App\Http\Controllers\Admin\PrestasiController as AdminPrestasiController;
use App\Http\Controllers\PrestasiController as PublicPrestasiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Admin\GuruController  as AdminGuruController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Admin\KalenderAkademikController;
use App\Http\Controllers\KalenderAkademikController as PublicKalenderController;
use App\Http\Controllers\JadwalPelajaranController;




// ===========================
// Halaman Publik
// ===========================

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Berita publik
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Prestasi publik
Route::get('/prestasi', [PublicPrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/prestasi/{slug}', [PublicPrestasiController::class, 'show'])->name('prestasi.show');

//sejarah publik
Route::get('/sejarah', [App\Http\Controllers\SejarahController::class, 'index'])->name('sejarah');

//visi misi publik
Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');

//kontak publik
Route::get('/kontak', function () {
    return view('profil.kontak');
})->name('kontak');

//kontak publik
Route::get('/tentang-kami', function () {
    return view('profil.tentang-kami');
})->name('tentang-kami');

// guru
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');

//public kalender
Route::get('/kalender-akademik', [PublicKalenderController::class, 'index'])->name('kalender-akademik.index');

// Jadwal Pelajaran Publik
Route::get('/jadwal', [JadwalPelajaranController::class, 'kelasList'])->name('jadwal.index'); // Halaman daftar kelas
Route::get('/jadwal/{kelas}', [JadwalPelajaranController::class, 'show'])->name('jadwal.show'); // Halaman show jadwal per kelas


// ===========================
// Autentikasi
// ===========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ===========================
// Area Admin (Harus Login)
// ===========================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');

    Route::resource('prestasi', AdminPrestasiController::class);
    Route::resource('users', UserController::class);
    Route::resource('hero_images', HeroImageController::class);
    Route::resource('kalender_akademik', KalenderAkademikController::class);
    Route::resource('sejarah', \App\Http\Controllers\Admin\SejarahController::class);
    Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class);
    Route::resource('kelas', \App\Http\Controllers\Admin\KelasController::class);
    Route::resource('jadwal', \App\Http\Controllers\Admin\JadwalPelajaranController::class);
    Route::resource('pengumuman', \App\Http\Controllers\Admin\PengumumanController::class);



    



    // Hanya admin yang bisa kelola berita
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::resource('berita', AdminBeritaController::class)->parameters([
            'berita' => 'berita'  // pastikan pakai parameter default
        ]);
    });
});
