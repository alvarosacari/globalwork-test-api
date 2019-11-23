<?php

use App\CandidateLaboralReference;
use Illuminate\Database\Seeder;

class CandidateLaboralReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        CandidateLaboralReference::truncate();

        $laboralReferences = [
            [
                'id' => 1,
                'company_name' => 'Carrefour',
                'contact_name' => 'Carlos Navarro',
                'start_at' => '1990-05-20',
                'leave_at' => '2019-06-21',
                'candidate_id' => 1,
            ],
            [
                'id' => 2,
                'company_name' => 'Exito',
                'contact_name' => 'Carlos Navarro',
                'start_at' => '1990-05-20',
                'leave_at' => '2019-06-21',
                'candidate_id' => 1,
            ],
            [
                'id' => 3,
                'company_name' => 'Estados financieros sas',
                'contact_name' => 'Andres Navarro',
                'start_at' => '1991-05-20',
                'leave_at' => '1991-06-21',
                'candidate_id' => 2,
            ],
            [
                'id' => 4,
                'company_name' => 'Caminando',
                'contact_name' => 'Carlos Mariano Zapata',
                'start_at' => '2000-05-20',
                'leave_at' => '2001-06-21',
                'candidate_id' => 2,
            ],
        ];

        CandidateLaboralReference::insert($laboralReferences);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
