<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'user_id' => '1',
                'name' => 'mario',
                'email' => 'mario.rossi@gmail.com',
                'body' => 'Salve dottore. Vorrei fissare una visita medica per la prossima settimana. Può indicarmi le sue disponibilità?'
            ],
            [
                'user_id' => '2',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Vorrei fare una visita specialistica con lei. La prossima settimana è disponibile?'
            ],
            [
                'user_id' => '3',
                'name' => 'paolo',
                'email' => 'paolo.bianchi@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?'
            ],
            [
                'user_id' => '4',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Buongiorno dottore. Quando possiamo fissare un appuntamento per una visita di controllo?'
            ],
            [
                'user_id' => '4',
                'name' => 'maria',
                'email' => 'maria.berti@gmail.com',
                'body' => 'Dottore dimenticavo: la prossima settimana io non sono disponibile. Per la settimana successiva lei ha disponibilità?'
            ],
            [
                'user_id' => '5',
                'name' => 'anna',
                'email' => 'anna.verdi@gmail.com',
                'body' => 'Buonasera dottore. Se possibile vorrei fissare una visita presso il suo studio di Bologna per la prossima settimana'
            ]

        ];

        foreach ($messages as $message) {
            $newMessage = new Message();

            $newMessage->user_id = $message['user_id'];
            $newMessage->name = $message['name'];
            $newMessage->email = $message['email'];
            $newMessage->body = $message['body'];

            $newMessage->save();
        }
    }
}
