<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();
        factory(App\Position::class, $apartments->count())->create();
    }
}
