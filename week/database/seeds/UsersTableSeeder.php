<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'soufien.hmaidi@Machinestalk.com',
                'password'       => '$2y$10$o.3HlxYJXlcYXcKHghtTaOunrWEAw1D1XYfdoVPqt9m/epPoowunq',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
