<?php

use App\User;
use App\UserDetail;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DoctorsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->name = $faker->firstName();
            $user->lastname = $faker->lastName();
            $user->email = $faker->email();
            $user->password = $faker->password(2, 16);
            $user->address = $faker->address();
            $user->save();

            $userDetail = new UserDetail();
            $userDetail->pic = 'https://picsum.photos/seed/'.rand(1,1000).'/200/300';
            $userDetail->phone = $faker->phoneNumber();
            $userDetail->curriculum = $faker->text(1000);

            $user->detail()->save($userDetail);
        }
    }
}


