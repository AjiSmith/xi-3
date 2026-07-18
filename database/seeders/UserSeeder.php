<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Semua user menggunakan password yang sama untuk kemudahan uji coba
        $defaultPassword = Hash::make('Azimas');

        $users = [
            [
                'name' => 'Admin',
                'username' => 'super_admin',
                'password' => $defaultPassword,
                'role' => 'admin',
            ],
            [
                'name' => 'Walikelas',
                'username' => 'moderator',
                'password' => $defaultPassword,
                'role' => 'walikelas',
            ],
            [
                'name' => 'Sekretaris',
                'username' => 'staff',
                'password' => $defaultPassword,
                'role' => 'sekretaris',
            ],
            [
                'name' => 'Bendahara',
                'username' => 'helper',
                'password' => $defaultPassword,
                'role' => 'bendahara',
            ],
            [
                'name' => 'Siswa',
                'username' => 'player',
                'password' => $defaultPassword,
                'role' => 'siswa',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']], // Unik berdasarkan username
                $user
            );
        }
    }
}