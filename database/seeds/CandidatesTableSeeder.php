<?php

use App\Candidate;
use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Candidate::truncate();

        $candidates = [
            [
                'id' => 1,
                'name' => 'Marco',
                'last_name' => 'Tzuc May',
                'phone' => '73684763274',
                'address' => 'Calle 64 e # 117 - 15',
            ],
            [
                'id' => 2,
                'name' => 'Hegel',
                'last_name' => 'Trigo',
                'phone' => '73684763174',
                'address' => 'Calle 34 e # 117 - 15',
            ],
        ];

        Candidate::insert($candidates);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
