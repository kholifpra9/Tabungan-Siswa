<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{
    public function dailyTabunganChart()
    {
        $user = Auth::user();

        if (!$user || !isset($user->username)) {
            abort(403, 'Unauthorized');
        }

        // Cek apakah user adalah siswa
        $siswa = Siswa::with('tabungan', 'kelas')->where('nis', $user->username)->first();

        if ($siswa) {
            // Logika untuk siswa
            $tabungan = $siswa->tabungan;

            if (!$tabungan) {
                abort(404, 'Tabungan tidak ditemukan untuk siswa ini.');
            }

            $transaksis = Transaksi::with('user')->where('tabungan_id', $tabungan->id)->get();

            return view('dashboard', compact('siswa', 'tabungan', 'transaksis'));
        }

        $kelasData = Kelas::with(['siswa.tabungan.transaksi' => function ($query) {
            $query->where('keterangan', 'setor')
                ->selectRaw('tabungan_id, DATE(tanggal) as date, SUM(nominal) as total')
                ->groupBy('tabungan_id', 'date');
        }])->get();

        $labels = [];
        $series = [];

        foreach ($kelasData as $kelas) {
            $dataPerDay = Transaksi::join('tabungans', 'tabungans.id', '=', 'transaksis.tabungan_id')
                ->join('siswas', 'siswas.nis', '=', 'tabungans.nis')
                ->where('siswas.kelas_id', $kelas->id)
                ->where('transaksis.keterangan', 'setor')
                ->select(FacadesDB::raw('DATE(transaksis.tanggal) as tanggal'), FacadesDB::raw('SUM(transaksis.nominal) as total'))
                ->groupBy('tanggal')
                ->orderBy('tanggal')
                ->get();

            $labels = $dataPerDay->pluck('tanggal')->map(function ($date) {
                return date('d M', strtotime($date));
            })->unique()->toArray();

            $series[] = [
                'name' => $kelas->nama_kelas,
                'data' => $dataPerDay->pluck('total')->toArray(),
            ];
        }

        $chart = (new LarapexChart)->lineChart()
            ->setSubtitle('Tabungan per kelas setiap hari.')
            ->setXAxis($labels)
            ->setDataset($series);

        // Kembalikan view untuk admin/kepsek
        return view('dashboard', compact('chart'));
    }



    public function siswaShow()
    {
        $user = Auth::user();

        if (!$user || !isset($user->username)) {
            abort(403, 'Unauthorized');
        }

        $siswa = Siswa::with('tabungan', 'kelas')->where('nis', $user->username)->firstOrFail();

        $tabungan = $siswa->tabungan;

        if (!$tabungan) {
            abort(404, 'Tabungan tidak ditemukan untuk siswa ini.');
        }

        $transaksis = Transaksi::with('user')->where('tabungan_id', $tabungan->id)->get();
    }

}
