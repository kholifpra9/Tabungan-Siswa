<?php

namespace App\Providers;

use App\Models\Kelas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('id');
        FacadesView::composer('dashboard', function ($view) {
            $jumlah_kelas1 = Siswa::where('kelas_id', 1)->count();
            $jumlah_kelas2 = Siswa::where('kelas_id', 2)->count();
            $jumlah_kelas3 = Siswa::where('kelas_id', 3)->count();
            $jumlah_kelas4 = Siswa::where('kelas_id', 4)->count();
            $jumlah_kelas5 = Siswa::where('kelas_id', 5)->count();
            $jumlah_kelas6 = Siswa::where('kelas_id', 6)->count();
            // Kirim data ke view
            $view->with([
                'jumlah_kelas1' => $jumlah_kelas1,
                'jumlah_kelas2' => $jumlah_kelas2,
                'jumlah_kelas3' => $jumlah_kelas3,
                'jumlah_kelas4' => $jumlah_kelas4,
                'jumlah_kelas5' => $jumlah_kelas5,
                'jumlah_kelas6' => $jumlah_kelas6,
            ]);
        });
    }
}
