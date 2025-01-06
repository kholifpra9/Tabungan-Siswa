<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TabunganController extends Controller
{

    public function showKelas(Kelas $kelas)
    {
        $siswa = $kelas->with('siswa.tabungan')->get();
        return view('tabungan.index', compact('kelas', 'siswa'));
    }

    public function riwayat(string $kelas, string $id){
        $data['kelas_id'] = $kelas;
        $data['tabungan'] = Tabungan::where('id', $id)->firstOrFail();
        $tabungan = Tabungan::where('id', $id)->firstOrFail();
        $data['siswa'] = Siswa::where('nis', $tabungan->nis)->firstOrFail();
        $data['transaksis'] = Transaksi::with('user')->where('tabungan_id', $tabungan->id)->get();
        return view('tabungan.riwayat', $data);
    }

    public function setor(string $kelas, string $id){
        $data['kelas_id'] = $kelas;
        $data['tabungan'] = Tabungan::where('id', $id)->firstOrFail();
        $tabungan = Tabungan::where('id', $id)->firstOrFail();
        $data['siswa'] = Siswa::where('nis', $tabungan->nis)->firstOrFail();
        return view('tabungan.setor', $data);
    }

    public function tarik(string $kelas, string $id){
        $data['kelas_id'] = $kelas;
        $data['tabungan'] = Tabungan::where('id', $id)->firstOrFail();
        $tabungan = Tabungan::where('id', $id)->firstOrFail();
        $data['siswa'] = Siswa::where('nis', $tabungan->nis)->firstOrFail();
        return view('tabungan.tarik', $data);
    }

    public function store_setor(Request $request)
    {
        $validated = $request->validate([
            'tabungan_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required|date',
            'nominal' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        $existingTransaction = Transaksi::where('tabungan_id', $request->tabungan_id)
            ->whereDate('tanggal', date('Y-m-d', strtotime($request->tanggal)))
            ->where('keterangan', 'setor')
            ->first();


        if ($existingTransaction) {
            return redirect()->back()->withErrors([
                'tanggal' => 'Setor hanya bisa dilakukan sekali dalam sehari untuk tabungan ini.'
            ])->withInput();
        }

        $tabungan = Tabungan::findOrFail($request->tabungan_id);
        $tabungan->saldo += $request->nominal;
        $tabungan->save();
    
        $transaksi = Transaksi::create([
            'tabungan_id' => $validated['tabungan_id'],
            'user_id' => $validated['user_id'],
            'tanggal' => $validated['tanggal'],
            'nominal' => $validated['nominal'],
            'saldo' => $tabungan->saldo,
            'keterangan' => $validated['keterangan'],
        ]);
    

        $notification = array(
            'message' => "Data Setor berhasil Ditambahkan!",
            'alert-type' => 'success'
        );

        $validatedd = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
        ]);
        
        $kelas_id = $validatedd['kelas_id'];


        if ($request->save == true) {
            return redirect()->route('tabungan.kelas', ['kelas' => $kelas_id])->with($notification);
        } else {
            return redirect()->route('tabungan.setor');
        }
    }

    public function store_tarik(Request $request)
    {
        $validated = $request->validate([
            'tabungan_id' => 'required',
            'user_id' => 'required',
            'tanggal' => 'required|date',
            'nominal' => 'required|numeric',
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $existingTransaction = Transaksi::where('tabungan_id', $request->tabungan_id)
            ->whereDate('tanggal', date('Y-m-d', strtotime($request->tanggal)))
            ->where('keterangan', 'tarik')
            ->first();

        if ($existingTransaction) {
            return redirect()->back()->withErrors([
                'tanggal' => 'Tarik tunai hanya bisa dilakukan sekali dalam sehari untuk tabungan ini.',
            ])->withInput();
        }

        $tabungan = Tabungan::find($request->tabungan_id);

        if (!$tabungan) {
            return redirect()->back()->withErrors([
                'tabungan_id' => 'Tabungan tidak ditemukan.',
            ])->withInput();
        }
    
        if ($tabungan->saldo < $request->nominal) {
            return redirect()->back()->withErrors([
                'nominal' => 'Saldo tidak mencukupi untuk melakukan tarik tunai.',
            ])->withInput();
        }
    
        $tabungan->saldo -= $request->nominal;
        $tabungan->save();

        $transaksi = Transaksi::create([
            'tabungan_id' => $validated['tabungan_id'],
            'user_id' => $validated['user_id'],
            'tanggal' => $validated['tanggal'],
            'nominal' => $validated['nominal'],
            'saldo' => $tabungan->saldo,
            'keterangan' => $validated['keterangan'],
            'kategori' => $validated['kategori'],
        ]);

        $notification = [
            'message' => "Tarik tunai berhasil dilakukan!",
            'alert-type' => 'success',
        ];

        $validatedd = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
        ]);
        
        $kelas_id = $validatedd['kelas_id'];


        if ($request->save == true) {
            return redirect()->route('tabungan.kelas', ['kelas' => $kelas_id])->with($notification);
        } else {
            return redirect()->route('tabungan.tarik');
        }
    }

    

}
