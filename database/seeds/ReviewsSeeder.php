<?php

use App\Review;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $reviews = [
            [
                'user_id' => '1',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Persona molto professionale e disponibile.',
            ],
            [
                'user_id' => '1',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Ottimo professionista, affidabile e disponibile.',
            ],
            [
                'user_id' => '1',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '1',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '2',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Assolutamente consigliato. Il dottore è molto disponibile e preparato sia professionalmente che umanamente, tornerò sicuramente in caso avessi bisogno. ',
            ],
            [
                'user_id' => '2',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Lo consiglio vivamente!',
            ],
            [
                'user_id' => '2',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Diagnosi corretta e terapia risolutiva. Preciso e molto disponibile nel dare spiegazioni: consigliato!',
            ],
            [
                'user_id' => '3',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
            ],
            [
                'user_id' => '3',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
            ],
            [
                'user_id' => '3',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
            ],
            [
                'user_id' => '4',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '4',
                'name' => 'Salvatore',
                'email' => $faker->email(),
                'body' => 'Medico di estrema precisione e professionalità. Attento alle necessità del paziente. Gentile e abile nel creare quel rapporto umano che per il paziente è fondamentale. Molto preparato e scrupoloso, aiutando il paziente nel percorso di guarigione migliore.',
            ],
            [
                'user_id' => '4',
                'name' => 'Mirco',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
            ],
            [
                'user_id' => '5',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
            ],
            [
                'user_id' => '5',
                'name' => 'Daniel',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
            ],
            [
                'user_id' => '5',
                'name' => 'Nadia',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
            ],



            [
                'user_id' => '6',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Persona molto professionale e disponibile.',
            ],
            [
                'user_id' => '6',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Ottimo professionista, affidabile e disponibile.',
            ],
            [
                'user_id' => '6',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '6',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '7',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Assolutamente consigliato. Il dottore è molto disponibile e preparato sia professionalmente che umanamente, tornerò sicuramente in caso avessi bisogno. ',
            ],
            [
                'user_id' => '7',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Lo consiglio vivamente!',
            ],
            [
                'user_id' => '7',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Diagnosi corretta e terapia risolutiva. Preciso e molto disponibile nel dare spiegazioni: consigliato!',
            ],
            [
                'user_id' => '8',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
            ],
            [
                'user_id' => '8',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Medico di grandi qualità professionali e umane, una perla rara.',
            ],
            [
                'user_id' => '8',
                'name' => 'Mariasol',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
            ],
            [
                'user_id' => '9',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '9',
                'name' => 'Salvatore',
                'email' => $faker->email(),
                'body' => 'Medico di estrema precisione e professionalità. Attento alle necessità del paziente. Gentile e abile nel creare quel rapporto umano che per il paziente è fondamentale. Molto preparato e scrupoloso, aiutando il paziente nel percorso di guarigione migliore.',
            ],
            [
                'user_id' => '9',
                'name' => 'Mirco',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
            ],
            [
                'user_id' => '10',
                'name' => 'Sebastiano',
                'email' => $faker->email(),
                'body' => 'Preparato e professionale',
            ],
            [
                'user_id' => '10',
                'name' => 'Daniel',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
            ],
            [
                'user_id' => '10',
                'name' => 'Nadia',
                'email' => $faker->email(),
                'body' => 'Specialista molto competente,disponibile all\'ascolto,chiaro nello spiegazioni.',
            ],
            [
                'user_id' => '11',
                'name' => 'Dario',
                'email' => $faker->email(),
                'body' => 'Assolutamente consigliato. Il dottore è molto disponibile e preparato sia professionalmente che umanamente, tornerò sicuramente in caso avessi bisogno. ',
            ],
            [
                'user_id' => '11',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Lo consiglio vivamente!',
            ],
            [
                'user_id' => '11',
                'name' => 'Giuseppe',
                'email' => $faker->email(),
                'body' => 'Diagnosi corretta e terapia risolutiva. Preciso e molto disponibile nel dare spiegazioni: consigliato!',
            ],
            [
                'user_id' => '12',
                'name' => 'Marco',
                'email' => $faker->email(),
                'body' => 'Persona molto professionale e disponibile.',
            ],
            [
                'user_id' => '12',
                'name' => 'Gianni',
                'email' => $faker->email(),
                'body' => 'Ottimo professionista, affidabile e disponibile.',
            ],
            [
                'user_id' => '12',
                'name' => 'Elena',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],
            [
                'user_id' => '12',
                'name' => 'Mimmo',
                'email' => $faker->email(),
                'body' => 'Molto disponibile, gentile e professionale. Fa sentire al suo agio anche il bambini.',
            ],

        ];

        foreach ($reviews as $review) {
            $newReview = new Review();

            $newReview->user_id = $review['user_id'];
            $newReview->name = $review['name'];
            $newReview->email = $review['email'];
            $newReview->body = $review['body'];

            $newReview->save();
        }
    }
}
