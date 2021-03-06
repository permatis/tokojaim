<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name'  => 'Administrator',
                'email' => 'admin@example.com',
                'password'  => 'admin123'
            ],
            [
                'id'    => 2,
                'name'  => 'User',
                'email' => 'user@example.com',
                'password' => 'user123'
            ]
        ];

        foreach($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
