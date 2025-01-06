<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Transaksi;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // Locale Indonesia

        // Daftar nama anak modern
        $namaAnakModern = [
            'Alya', 'Aqila', 'Azzam', 'Daffa', 'Farel', 'Keysha', 'Rafa', 'Zahra',
            'Naira', 'Kayla', 'Naufal', 'Arkan', 'Alif', 'Cinta', 'Nadira', 'Zaki',
            'Iqbal', 'Aruna', 'Jihan', 'Yumna', 'Aveline', 'Kirana', 'Rania', 'Darren',
            'Kenza', 'Reyhan', 'Farhan', 'Livia', 'Tasya', 'Nadya', 'Alden', 'Elvira',
            'Nara', 'Kenzo', 'Shaquille', 'Yasmin', 'Viona', 'Davina', 'Nashwa', 'Izan',
            'Zamira', 'Fadhil', 'Alana', 'Selina', 'Hana', 'Kaila', 'Zayyan', 'Zidan',
            'Athaya', 'Sienna', 'Malika', 'Naura', 'Dian', 'Erlang', 'Keisha', 'Luthfi',
            'Avicenna', 'Raysa', 'Aqilla', 'Jovial', 'Renata', 'Amira', 'Fathan', 'Azzura'
        ];

        // Pastikan role "siswa" ada
        

        // Data siswa per kelas
        $kelas = [
            1 => 'Kelas 1',
            2 => 'Kelas 2',
            3 => 'Kelas 3',
        ];

        foreach ($kelas as $kelas_id => $kelas_nama) {
            for ($i = 1; $i <= 5; $i++) {
                $nis = $kelas_id . str_pad($i, 3, '0', STR_PAD_LEFT) . '123'; // NIS nomor cantik

                
                $namaAnak = $faker->randomElement($namaAnakModern);

                // Buat data siswa
                $siswa = Siswa::create([
                    'nis' => $nis,
                    'kelas_id' => $kelas_id,
                    'nama' => $namaAnak,
                    'tanggal_lahir' => $faker->dateTimeBetween('-12 years', '-10 years')->format('Y-m-d'),
                    'alamat' => $faker->address,
                    'no_hp' => '0812' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                    'nama_ortu' => $faker->name('male' | 'female'),
                ]);

                // Buat user siswa
                $user = User::create([
                    'name' => $siswa->nama,
                    'username' => $siswa->nis,
                    'email_verified_at' => now(),
                    'password' => Hash::make($siswa->nis),
                ]);

                // Assign role siswa
                $user->assignRole('siswa');

                // Buat data tabungan
                $tabungan = Tabungan::create([
                    'nis' => $siswa->nis,
                    'saldo' => 0,
                ]);

                 
                 $initialSaldo = 0; 
                 for ($j = 1; $j <= 3; $j++) { 
                     $nominal = $faker->numberBetween(10000, 50000); 
                     $initialSaldo += $nominal; 
 
                     Transaksi::create([
                         'tabungan_id' => $tabungan->id,
                         'user_id' => '2',
                         'tanggal' => $faker->dateTimeBetween('-1 months', 'now')->format('Y-m-d'),
                         'nominal' => $nominal,
                         'saldo' => $initialSaldo,
                         'keterangan' => 'setor',
                     ]);
                 }
 
                 $tabungan->saldo = $initialSaldo;
                 $tabungan->save();
            }
        }
    }
}
