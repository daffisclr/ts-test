<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodis')->insert([

            // Teknik Informatika
            [
                'kode_prodi' => '55301',
                'nama_prodi' => 'Teknik Informatika',
                'jenjang_prodi' => 'D4',
            ],
            // Teknik Multimedia dan Jaringan
            [
                'kode_prodi' => '90346',
                'nama_prodi' => 'Teknik Multimedia dan Jaringan',
                'jenjang_prodi' => 'D4',
            ],
            // Teknik Multimedia Digital
            [
                'kode_prodi' => '20304',
                'nama_prodi' => 'Teknik Multimedia Digital',
                'jenjang_prodi' => 'D4',
            ],
            // Teknik Komputer dan Jaringan
            [
                'kode_prodi' => '56601',
                'nama_prodi' => 'Teknik Komputer dan Jaringan',
                'jenjang_prodi' => 'D1',
            ],
        ]);
    }
}
