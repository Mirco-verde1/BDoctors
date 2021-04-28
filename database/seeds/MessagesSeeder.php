<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $messages = [
            [
                'user_id' => '1',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '1',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '2',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '2',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '3',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '3',
                'name' => 'guido',
                'email' => 'guido.verdi@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '4',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '4',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '5',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '5',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '5',
                'name' => 'anna',
                'email' => 'anna.verdi@gmail.com',
                'body' => 'Buonasera dottore. Se possibile vorrei fissare una visita presso il suo studio di Bologna per la prossima settimana',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '6',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '6',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '7',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '7',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '8',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '8',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '9',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '9',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '10',
                'name' => 'anna',
                'email' => 'anna.verdi@gmail.com',
                'body' => 'Buonasera dottore. Se possibile vorrei fissare una visita presso il suo studio di Bologna per la prossima settimana',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '10',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '11',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '11',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '12',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '12',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],
            [
                'user_id' => '12',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?',
                'created_at' => $faker->dateTimeInInterval('-6 days', '+6 days')
            ],

        ];

        foreach ($messages as $message) {
            $newMessage = new Message();

            $newMessage->user_id = $message['user_id'];
            $newMessage->name = $message['name'];
            $newMessage->email = $message['email'];
            $newMessage->body = $message['body'];
            $newMessage->created_at = $message['created_at'];

            $newMessage->save();
        }
    }
}
