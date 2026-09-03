<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Admin\LegalityController as AdminLegalityController;
use App\Http\Controllers\LegalityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;   
use App\Http\Controllers\InformationController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIK
|--------------------------------------------------------------------------
*/

/* BERANDA */
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');


/*
|--------------------------------------------------------------------------
| TENTANG KAMI
|--------------------------------------------------------------------------
*/

Route::prefix('tentang-kami')->name('about.')->group(function () {

    Route::view('/profil', 'tentang.profil')
        ->name('profile');

    Route::view('/sejarah', 'tentang.sejarah')
        ->name('history');

    Route::view('/visi-misi', 'tentang.visi-misi')
        ->name('vision');

    Route::view('/nilai-nilai', 'tentang.nilai')
        ->name('values');

    Route::view('/struktur-organisasi', 'tentang.struktur')
        ->name('organization');

    Route::get(
        '/legalitas',
        [LegalityController::class, 'index']
    )->name('legal');
});


/*
|--------------------------------------------------------------------------
| PROGRAM
|--------------------------------------------------------------------------
*/

Route::prefix('program')->name('programs.')->group(function () {

    Route::get(
        '/',
        [ProgramController::class, 'index']
    )->name('index');

    Route::get(
        '/pendidikan',
        [ProgramController::class, 'education']
    )->name('education');

    Route::get(
        '/sosial-kemanusiaan',
        [ProgramController::class, 'social']
    )->name('social');

    Route::get(
        '/pemberdayaan',
        [ProgramController::class, 'empowerment']
    )->name('empowerment');

    Route::get(
        '/pelatihan-pengembangan',
        [ProgramController::class, 'training']
    )->name('training');
});


/*
|--------------------------------------------------------------------------
| DAMPAK
|--------------------------------------------------------------------------
*/

Route::view('/dampak', 'dampak.index')
    ->name('impact');


/*
|--------------------------------------------------------------------------
| INFORMASI
|--------------------------------------------------------------------------
*/

Route::prefix('informasi')->name('information.')->group(function () {

    Route::get(
        '/',
        [InformationController::class, 'index']
    )->name('index');

    Route::get(
        '/berita',
        [NewsController::class, 'index']
    )->name('news');

    Route::get(
        '/berita/{slug}',
        [NewsController::class, 'show']
    )->name('news.show');

    Route::get(
        '/kegiatan',
        [ActivityController::class, 'index']
    )->name('activities');

    Route::get(
        '/kegiatan/{slug}',
        [ActivityController::class, 'show']
    )->name('activities.show');
});


/*
|--------------------------------------------------------------------------
| MITRA
|--------------------------------------------------------------------------
*/

Route::get(
    '/mitra',
    [PartnerController::class, 'index']
)->name('partners');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/

Route::get(
    '/kontak',
    [ContactController::class, 'index']
)->name('contact');

Route::post(
    '/kontak',
    [ContactController::class, 'store']
)->name('contact.store');


/*
|--------------------------------------------------------------------------
| DONASI
|--------------------------------------------------------------------------
*/

Route::view('/donasi', 'donasi.index')
    ->name('donation');


/*
|--------------------------------------------------------------------------
| ADMIN CMS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | BERITA
        |--------------------------------------------------------------------------
        */

        Route::resource('berita', NewsController::class)
            ->parameters([
                'berita' => 'news'
            ])
            ->except(['show'])
            ->names('news');



        /*
        |--------------------------------------------------------------------------
        | KEGIATAN
        |--------------------------------------------------------------------------
        */

        Route::resource('kegiatan', AdminActivityController::class)
            ->parameters([
                'kegiatan' => 'activity'
            ])
            ->except(['show'])
            ->names('activities');
            


        /*
        |--------------------------------------------------------------------------
        | PROGRAM
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/program',
            [AdminProgramController::class, 'index']
        )->name('programs.index');

        Route::get(
            '/program/{program}/edit',
            [AdminProgramController::class, 'edit']
        )->name('programs.edit');

        Route::put(
            '/program/{program}',
            [AdminProgramController::class, 'update']
        )->name('programs.update');

        /*
        |--------------------------------------------------------------------------
        | MITRA
        |--------------------------------------------------------------------------
        */

        Route::resource('mitra', AdminPartnerController::class)
            ->parameters([
                'mitra' => 'partner'
            ])
            ->except(['show'])
            ->names('partners');

        /*
        |--------------------------------------------------------------------------
        | LEGALITAS
        |--------------------------------------------------------------------------
        */

        Route::resource('legalitas', AdminLegalityController::class)
            ->parameters([
                'legalitas' => 'legality'
            ])
            ->except(['show'])
            ->names('legalities');

        
        /*
        |--------------------------------------------------------------------------
        | PESAN MASUK
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pesan',
            [ContactMessageController::class, 'index']
        )->name('messages.index');

        Route::get(
            '/pesan/{contactMessage}',
            [ContactMessageController::class, 'show']
        )->name('messages.show');

        Route::patch(
            '/pesan/{contactMessage}/unread',
            [ContactMessageController::class, 'markUnread']
        )->name('messages.unread');

        Route::delete(
            '/pesan/{contactMessage}',
            [ContactMessageController::class, 'destroy']
        )->name('messages.destroy');

        /*
        |--------------------------------------------------------------------------
        | PENGATURAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pengaturan',
            [SettingController::class, 'index']
        )->name('settings.index');

        Route::put(
            '/pengaturan',
            [SettingController::class, 'update']
        )->name('settings.update');

        /*
        |--------------------------------------------------------------------------
        | KELOLA USER
        |--------------------------------------------------------------------------
        */

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])
            ->name('users.update-role');

    });


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';