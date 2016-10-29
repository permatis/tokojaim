<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Buat data kategori
         */
        $kategori = [
            ['id' => 1, 'nama' => 'Komputer', 'deskripsi' => 'Komputer', 'parent_id' => 0],
            ['id' => 2, 'nama' => 'Elektronik', 'deskripsi' => 'Elektronik', 'parent_id' => 0],
            ['id' => 3, 'nama' => 'Televisi', 'deskripsi' => 'Televisi', 'parent_id' => 2],
            ['id' => 4, 'nama' => 'AC', 'deskripsi' => 'AC', 'parent_id' => 2],
            ['id' => 5, 'nama' => 'Mesin Cuci', 'deskripsi' => 'Mesin Cuci', 'parent_id' => 2],
            ['id' => 6, 'nama' => 'Kulkas', 'deskripsi' => 'Kulkas', 'parent_id' => 2],
            ['id' => 7, 'nama' => 'Processor', 'deskripsi' => 'Processor', 'parent_id' => 1],
            ['id' => 8, 'nama' => 'Motherboard', 'deskripsi' => 'Motherboard', 'parent_id' => 1],
            ['id' => 9, 'nama' => 'Hardisk', 'deskripsi' => 'Hardisk', 'parent_id' => 1],
            ['id' => 10, 'nama' => 'Printer', 'deskripsi' => 'Printer', 'parent_id' => 1],
            ['id' => 12, 'nama' => 'Laptop', 'deskripsi' => 'Laptop', 'parent_id' => 1],
            ['id' => 13, 'nama' => 'Aksesoris', 'deskripsi' => 'Aksesoris', 'parent_id' => 1]
        ];

        foreach ($kategori as $value) {
        	\App\Models\Kategori::create($value);
        }
    }
}
