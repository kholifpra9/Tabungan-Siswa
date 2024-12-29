<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'kepala sekolah', 'siswa'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        $kepsek = User::create([
            
            'name' => 'Kepala Sekola Yeti',
            'username' => 'kepsek',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
        $kepsek->assignRole('kepala sekolah');

        $admin1 = User::create([
            
            'name' => 'pak asep',
            'username' => 'admin1',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        
        ]);
        $admin1->assignRole('admin');
    }
}
