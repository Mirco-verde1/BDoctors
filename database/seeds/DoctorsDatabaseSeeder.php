<?php

use App\User;
use App\UserDetail;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class DoctorsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run(Faker $faker)
    // {
    //     for ($i = 0; $i < 20; $i++) {
    //         $user = new User();
    //         $user->name = $faker->firstName();
    //         $user->lastname = $faker->lastName();
    //         $user->email = $faker->email();
    //         $user->password = Hash::make('mimmomimmo');
    //         $user->address = $faker->address();
    //         $user->save();

    //         $userDetail = new UserDetail();
    //         $userDetail->pic = 'https://picsum.photos/seed/'.rand(1,1000).'/200/300';
    //         $userDetail->phone = $faker->e164PhoneNumber();
    //         $userDetail->curriculum = $faker->text(1000);

    //         $user->detail()->save($userDetail);
    //     }
    // }

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


