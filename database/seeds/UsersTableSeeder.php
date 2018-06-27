<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $password = bcrypt('secret');

        $data = [
            [
                'email'     =>   'leo@gmail.com',
                'password'  =>   $password,
                'name'      =>   'Leo'
            ],
            [
                'email'     =>   'jessica@gmail.com',
                'password'  =>   $password,
                'name'      =>   'Jessica'
            ],
            [
                'email'     =>   'ma@gmail.com',
                'password'  =>   $password,
                'name'      =>   'Maria'
            ],
        ];

        foreach($data as $user) {
            User::create($user);
        }
    }
}
