<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'nama_kelas' => 'kelas 1',
            ],
            [
                'nama_kelas' => 'kelas 2',
            ],
            [
                'nama_kelas' => 'kelas 3',
            ],
            [
                'nama_kelas' => 'kelas 4',
            ],
            [
                'nama_kelas' => 'kelas 5',
            ],
            [
                'nama_kelas' => 'kelas 6',
            ],
        ]);
    }
}
