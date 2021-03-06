<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $services = ['Wi-Fi', 'Animali Permessi', 'Posto Macchina', 'Piscina', 'Portineria', 'Sauna', 'Vista Mare'];
      foreach($services as $service){
        DB::table('services')->insert([
          'name' => $service,
        ]);
      }
    }
}
