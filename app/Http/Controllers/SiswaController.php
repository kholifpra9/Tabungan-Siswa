<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index(){
        $data['siswas'] = Siswa::with('kelas')->get();
        return view('siswa.index', $data);
    }

    public function create(){
        $data['kelas'] = Kelas::pluck('nama_kelas', 'id');
        return view('siswa.create', $data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'kelas_id' => 'required',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'nama_ortu' => 'required|string|max:255',
        ]);
        $siswa = Siswa::create($validated);
        $user = User::create([
            'name' => $siswa->nama,
            'username' => $siswa->nis,
            'email_verified_at' => now(),
            'password' => Hash::make($siswa->nis),
        ]);
        $user->assignRole('siswa');

        $tabungan = Tabungan::create([
            'nis' => $siswa->nis,
            'saldo' => 0,
        ]);

        $notification = array(
            'message' => "Data Siswa berhasil Ditambahkan!",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('siswa.index')->with($notification);
        }
        else{
            return redirect()->route('siswa.create');
        }
    }

    public function edit(string $nis){
        $data['siswa'] = Siswa::where('nis', $nis)->firstOrFail();
        $data['kelas'] = Kelas::pluck('nama_kelas', 'id');
        return view('siswa.edit', $data);
    }

    public function update(Request $request, string $nis){
        $validated = $request->validate([
            
            'kelas_id' => 'required',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'nama_ortu' => 'required|string|max:255',
        ]);

        Siswa::where('nis', $nis)->update($validated);

        $notification = array(
            'message' => "Data Siswa berhasil diupdate!",
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('siswa.index')->with($notification);
        }
        else{
            return redirect()->route('siswa.create');
        }
    }

    public function destroy(string $nis){
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $siswa->delete();

        $notification = array(
            'message' => "Data Siswa berhasil dihapus!",
            'alert-type' => 'success'
        );

        return redirect()->route('siswa.index')->with($notification);
    }

    public function show($nis)
    {
        $siswa = Siswa::where('nis', $nis)->with('kelas')->first();

        if (!$siswa) {
            return response()->json(['error' => 'Siswa tidak ditemukan'], 404);
        }

        return response()->json($siswa);
    }
}
