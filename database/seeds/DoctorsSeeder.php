<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorsSeeder extends Seeder
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
                'name' => 'Giulio',
                'lastname' => 'Tavoni',
                'email' => 'tavoni@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'via pippo',
            ],
            [
                'name' => 'Samuel',
                'lastname' => 'Pleura',
                'email' => 'gbadamosi@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'via poaolo',
            ],
            [
                'name' => 'Pippo',
                'lastname' => 'Gulli',
                'email' => 'gulli@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'via paperino 13',
            ],
            [
                'name' => 'Giacomo',
                'lastname' => 'Biffi',
                'email' => 'biffi@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'via pluto 13',
            ],
            [
                'name' => 'Vincenzo',
                'lastname' => 'Donato',
                'email' => 'donato@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'via archimede 13',
            ]
        ];

        foreach ($users as $user) {
            $newUser = new User();

            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->address = $user['address'];

            $newUser->save();
        }
    }
}
