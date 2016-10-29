<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Buat data tag
         */
        $tag = [
            ['id' => '1', 'nama' => 'komputer'],
            ['id' => '2', 'nama' => 'elektronik'],
            ['id' => '3', 'nama' => 'televisi'],
            ['id' => '4', 'nama' => 'ac'],
            ['id' => '5', 'nama' => 'mesin cuci'],
            ['id' => '6', 'nama' => 'kulkas'],
            ['id' => '7', 'nama' => 'processor'],
            ['id' => '8', 'nama' => 'motherboard'],
            ['id' => '9', 'nama' => 'hardisk'],
            ['id' => '10', 'nama' => 'printer'],
            ['id' => '11', 'nama' => 'laptop'],
            ['id' => '12', 'nama' => 'aksesoris']
        ]; 

        foreach ($tag as $value) {
        	\App\Models\Tag::create($value);
        }
    }
}
