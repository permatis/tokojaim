<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(GambarTableSeeder::class);
        $this->call(ProdukTableSeeder::class);
    }
}
