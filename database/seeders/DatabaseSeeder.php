<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Barang;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cabangtoko;
use App\Models\Pegawaitoko;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        User::factory()->create([
            'name' => 'manajer1',
            'email' => 'manajer1@example.com',
        ]);

        Cabangtoko::create([
            'nama_cabang' => 'Toko 1',
            'alamat_cabang' => 'jln M.Yamin.SH',
        ]);


        Pegawaitoko::create([
            'user_id' => 1,
            'cabangtoko_id' => 1,
            'jabatan' => 'Manajer',
        ]);

       
    }
}
