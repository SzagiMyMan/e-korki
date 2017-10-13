<?php

use Illuminate\Database\Seeder;
use App\Offer;

class OffersTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*user_id price_per_hour name description*/
        $offer= new Offer();
        $offer->user_id=1;
        $offer->price_per_hour=20;
        $offer->name='Matematyka';
        $offer->description='Opis oferty';
        $offer->save();

        $faker = Faker\Factory::create();
        for( $i=1 ; $i <= 100 ; $i++ ){
            $offer= new Offer();
            $offer->user_id=$i;
            $offer->price_per_hour=$faker->numberBetween(2,50);
            $offer->name=$faker->word;
            $offer->description=$faker->sentence(40);
            $offer->save();
        }
    }
}
