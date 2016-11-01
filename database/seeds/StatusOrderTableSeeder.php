<?php

use Illuminate\Database\Seeder;

class StatusOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
        	['nama' => 'menunggu', 'deskripsi' => 'Menunggu konfirmasi pemesan.'],
        	['nama' => 'proses', 'deskripsi' => 'Masih dalam pengiriman. Pengiriman 1-2 hari jam kerja.'],
        	['nama' => 'cancel', 'deskripsi' => 'Pemesanan tidak jadi.'],
        	['nama' => 'ditolak', 'deskripsi' => 'Pemesanan ditolak.'],
        	['nama' => 'suskses', 'deskripsi' => 'Pemesanan sudah dibayar, dikirim, dan diterima oleh pemesan.']
        ];

        foreach($status as $value) {
        	\App\Models\StatusOrder::create($value);
        }
    }
}
