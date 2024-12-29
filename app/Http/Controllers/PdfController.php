<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function siswaPrint(){
        $siswa = Siswa::with('kelas')->get();
        $data = [
            'title' => 'Data Siswa Tabungan',
            'date' => date('m/d/Y'),
            'siswa' => $siswa
        ]; 
        $pdf = FacadePdf::loadview('pdf.siswa-print', $data);
        return $pdf->download('Cetak Siswa.pdf');
    }

    public function kelasPrint(Kelas $kelas)
    {
        $siswa = $kelas->siswa()->with('tabungan')->get();

        $data = [
            'title' => 'Data Siswa Tabungan Per Kelas, ' . str_replace(' ', '_', $kelas->nama_kelas),
            'date' => date('m/d/Y'),
            'siswa' => $siswa,
            'kelas' => $kelas
        ];

        $pdf = FacadePdf::loadview('pdf.siswa-tabungan-print', $data);
        $filename = 'Cetak_Siswa_Tabungan_Kelas_' . str_replace(' ', '_', $kelas->nama_kelas) . '.pdf';
        return $pdf->download($filename);
    }

    public function riwayatPrint(string $id)
    {
        $tabungan = Tabungan::where('id', $id)->firstOrFail();

        $siswa = Siswa::where('nis', $tabungan->nis)->firstOrFail();

        $transaksis = Transaksi::with('user')->where('tabungan_id', $tabungan->id)->get();

        $data = [
            'tabungan' => $tabungan,
            'siswa' => $siswa,
            'transaksis' => $transaksis,
        ];


        $pdf = FacadePdf::loadView('pdf.siswa-riwayat-print', $data);
        $filename = 'Cetak_Tabungan_' . str_replace(' ', '_', $siswa->nama) . '.pdf';
        return $pdf->download($filename);
    }
}
