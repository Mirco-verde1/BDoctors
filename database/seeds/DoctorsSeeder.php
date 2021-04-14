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
                'name' => 'Lorenzo',
                'lastname' => 'Monaldo',
                'email' => 'monaldo@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Campi Flegrei, 17',
            ],
            [
                'name' => 'Palmira',
                'lastname' => 'Fallaci',
                'email' => 'fallaci@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Ponte In Valtellina, 2',
            ],
            [
                'name' => 'Germano',
                'lastname' => 'Nucci',
                'email' => 'nucci@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Piazza San Carlo, 13',
            ],
            [
                'name' => 'Albina',
                'lastname' => 'Giordano',
                'email' => 'giordano@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Venezia, 56',
            ],
            [
                'name' => 'Romilda',
                'lastname' => 'Lo Duca',
                'email' => 'loduca@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Catullo, 34',
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
