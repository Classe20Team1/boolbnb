<?php

use Illuminate\Database\Seeder;
use App\Apartment;

class ImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $apartments = Apartment::all();
            factory(App\Img::class, $apartments->count()*3)->create();
    }
}
