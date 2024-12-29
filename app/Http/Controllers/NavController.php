<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
        $kelasWithStudents = Kelas::whereHas('siswas')->get(); // Pastikan relasi 'siswas' sudah ada di model Kelas
        return view('siswa.index', compact('kelasWithStudents'));
    }
    public function byClass($kelasId)
    {
        $kelas = Kelas::with('siswas')->findOrFail($kelasId);
        return view('siswa.kelas', compact('kelas'));
    }
}
