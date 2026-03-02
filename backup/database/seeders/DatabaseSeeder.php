<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Akun Admin
        User::updateOrCreate(
            ['email' => 'endmin@gmail.com'],
            [
                'name' => 'Endministrator',
                'password' => Hash::make('endmin'),
                'role' => 'admin',
            ]
        );

        // Menambahkan Data Buku Awal
        Book::updateOrCreate(
            ['title' => 'Anak Cahaya'],
            [
                'author' => 'Tere Liye',
                'category' => 'Novel',
                'stock' => 10,
            ]
        );
    }
}