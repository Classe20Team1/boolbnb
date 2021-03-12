<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Sponsor;

class SponsorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsortypes = [
            [
                'price' => 299,
                'days' => 1,
                'description' => 'Sponsorizza per 1 giorno'
            ],
            [
                'price' => 599,
                'days' => 3,
                'description' => 'Sponsorizza per 3 giorni'
            ],
            [
                'price' => 999,
                'days' => 6,
                'description' => 'Sponsorizza per 6 giorni'
            ]
        ];
        foreach ($sponsortypes as $type){
            DB::table('sponsortypes')->insert([
                'price' => $type['price'],
                'days' => $type['days'],
                'description' => $type['description']
            ]);
        }

        // ● 2,99 € per 24 ore di sponsorizzazione 
        // ● 5.99 € per 72 ore di sponsorizzazione 
        // ● 9.99 € per 144 ore di sponsorizzazione 

    }
}
