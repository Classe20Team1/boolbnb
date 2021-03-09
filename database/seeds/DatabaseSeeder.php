<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserInfoSeeder::class,
            ApartmentSeeder::class,
            MessageSeeder::class,
            PositionSeeder::class,
            ImgSeeder::class,
            ServiceSeeder::class,
            ApartmentServiceSeeder::class,
            SponsorTypeSeeder::class,
        ]);
    }
}
