<?php

use Illuminate\Database\Seeder;

class GambarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Buat data gambar
         */
        $gambar = [
            ['id' => 1, 'nama' => 'Hardisk Eksternal Seagate Backup Plus Slim 1TB Portable', 'file' => '013cd927e0adc8ab9ed155edf35dbd12.jpg'],
            ['id' => 2, 'nama' => 'Hardisk Eksternal Seagate Backup Plus Slim 1TB Portable', 'file' => 'ebd88347d829c47e18fc802fc63fa12e.jpg'],
            ['id' => 3, 'nama' => 'Hardisk Eksternal Seagate Backup Plus Slim 1TB Portable', 'file' => 'db6bbfa8fa873fbdcb12bb499507f575.jpg'],
            ['id' => 4, 'nama' => 'Xiaomi Mi Notebook Air 12.5 Inch Windows 10', 'file' => '5f43c3ce480d9e74f6bddd00c2e53aa5.jpg'],
            ['id' => 5, 'nama' => 'Xiaomi Mi Notebook Air 12.5 Inch Windows 10', 'file' => '30ac60eca35d21117eb314bbf1233053.jpg'],
            ['id' => 6, 'nama' => 'Xiaomi Mi Notebook Air 12.5 Inch Windows 10', 'file' => 'c5a14518b45a20c93ea8526a1ccb57da.jpg'],
            ['id' => 7, 'nama' => 'Xiaomi Mi Notebook Air 12.5 Inch Windows 10', 'file' => '218c07495ebcb080f8f1810d3441ecc0.jpg'],
            ['id' => 8, 'nama' => 'Lg 43LX310C Led Tv Full Hd With Vga Input - Silver', 'file' => 'abb3e43f1acec09ea66b166b7b06188f.jpg'],
            ['id' => 9, 'nama' => 'Lg 43LX310C Led Tv Full Hd With Vga Input - Silver', 'file' => '9babf6a214ad6350563a4a6bf9fd1d3d.jpg'],
            ['id' => 10, 'nama' => 'Lg 43LX310C Led Tv Full Hd With Vga Input - Silver', 'file' => '0eca83f906d72eb4f391c14e19b4f6ac.jpg'],
            ['id' => 11, 'nama' => 'TV LG LED 22 Inch LB450A Hitam', 'file' => 'f86a4e42d6bc15940aa2daaee2ebacf7.jpg'],
            ['id' => 12, 'nama' => 'TV LG LED 22 Inch LB450A Hitam', 'file' => 'b0e1ec44ec63285c5a70862c4368dd87.jpg'],
            ['id' => 13, 'nama' => 'TV LG LED 22 Inch LB450A Hitam', 'file' => 'be38e2c7131ca0f201be3567bf6a897f.jpg'],
            ['id' => 14, 'nama' => 'TV LG LED 22 Inch LB450A Hitam', 'file' => 'aea1c6c862a8b10533b2c096978336b0.jpg'],
            ['id' => 15, 'nama' => 'Mini Printer Thermal Bluetooth 58mm EPPOS EP5802A', 'file' => '259e618f57541ae58acb0d60079640b9.jpg'],
            ['id' => 16, 'nama' => 'Mini Printer Thermal Bluetooth 58mm EPPOS EP5802A', 'file' => '7873ccc21e29ee982666b3b61f6f2ce6.jpg'],
            ['id' => 17, 'nama' => 'Mini Printer Thermal Bluetooth 58mm EPPOS EP5802A', 'file' => 'dfdc64c7ffef7e307a4f9f131eea6ef3.jpg']
        ];

        foreach ($gambar as $value) {
        	\App\Models\Gambar::create($value);
        }
    }
}
