<?php

use App\User;
use App\UserDetail;
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
                'department' => 'cardiologia',
                'email' => 'monaldo@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Campi Flegrei, 17',
            ],
            [
                'name' => 'Palmira',
                'lastname' => 'Fallaci',
                'department' => 'cardiologia',
                'email' => 'fallaci@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Ponte In Valtellina, 2',
            ],
            [
                'name' => 'Germano',
                'lastname' => 'Nucci',
                'department' => 'cardiologia',
                'email' => 'nucci@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Piazza San Carlo, 13',
            ],
            [
                'name' => 'Albina',
                'lastname' => 'Giordano',
                'department' => 'cardiologia',
                'email' => 'giordano@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Venezia, 56',
            ],
            [
                'name' => 'Romilda',
                'lastname' => 'Lo Duca',
                'department' => 'cardiologia',
                'email' => 'loduca@bdoctors.it',
                'password' => Hash::make("12345678"),
                'address' => 'Via Catullo, 34',
            ]
        ];

        foreach ($users as $user) {
            $newUser = new User();

            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->department = $user['department'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->address = $user['address'];

            $newUser->save();
        }

        $userDetails = [
            [
                'user_id' => '1',
                'pic' => 'https://picsum.photos/seed/'.rand(1,1000).'/200/300',
                'phone' => '+3903564039188',
                'curriculum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],
            [
                'user_id' => '2',
                'pic' => 'https://picsum.photos/seed/'.rand(1,1000).'/200/300',
                'phone' => '+3903561325788',
                'curriculum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],
            [
                'user_id' => '3',
                'pic' => 'https://picsum.photos/seed/'.rand(1,1000).'/200/300',
                'phone' => '+3903546289475',
                'curriculum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],
            [
                'user_id' => '4',
                'pic' => 'https://picsum.photos/seed/'.rand(1,1000).'/200/300',
                'phone' => '+39035675632545',
                'curriculum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],
            [
                'user_id' => '5',
                'pic' => 'https://picsum.photos/seed/'.rand(1,1000).'/200/300',
                'phone' => '+3903564598665',
                'curriculum' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'
            ],

        ];

        foreach ($userDetails as $userDetail) {
            $newUserDetail = new UserDetail();

            $newUserDetail->user_id = $userDetail['user_id'];
            $newUserDetail->pic = $userDetail['pic'];
            $newUserDetail->phone = $userDetail['phone'];
            $newUserDetail->curriculum = $userDetail['curriculum'];

            $newUserDetail->save();
        }
    }
}
