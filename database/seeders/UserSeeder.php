<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@ukk.com',
                'password' => Hash::make('admin'), // Menggunakan Hash::make untuk mengenkripsi password dengan bcrypt
                'role' => 'admin'
            ],
            [
                'username' => 'user',
                'email' => 'user@ukk.com',
                'password' => Hash::make('user'), // Menggunakan Hash::make untuk mengenkripsi password dengan bcrypt
                'role' => 'user'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
