<?php

use App\MedicalService;
use Illuminate\Database\Seeder;

class MedicalServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicalServices = [
            [
                'name' => 'Assistenza Domiciliare',
                'price' => 50.00
            ],
            [
                'name' => 'Esami Strumentali',
                'price' => 100.00
            ],
            [
                'name' => 'Esami di Laboratorio',
                'price' => 46.00
            ],
            [
                'name' => 'Ginnastica di Riabilitazione',
                'price' => 120.00
            ],
            [
                'name' => 'Perizia Medico legale per Responsabilità',
                'price' => 200.00
            ],
            [
                'name' => 'Rilascio Certificati',
                'price' => 45.00
            ],
            [
                'name' => 'Seduta di Neuropsichiatria',
                'price' => 60.00
            ],
            [
                'name' => 'Video Consulto',
                'price' => 25.00
            ],
            [
                'name' => 'Visita di Controllo',
                'price' => 35.00
            ],
            [
                'name' => 'Visita Specialistica',
                'price' => 65.00
            ]
        ];

        foreach ($medicalServices as $medicalService) {
            $newMedicalService = new MedicalService();

            $newMedicalService->name = $medicalService['name'];
            $newMedicalService->price = $medicalService['price'];

            $newMedicalService->save();
        }
    }
}
