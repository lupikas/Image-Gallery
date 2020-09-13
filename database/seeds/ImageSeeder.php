<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('App\Image');

      for($i = 0; $i < 50; $i++){

          DB::table('photos')->insert([
              'name' => $faker->regexify('[A-Za-z]{8}'),
              'describtion' => $faker->sentence($nbWords = 10, $variableNbWords = true),
              'link' => $faker->url(),
          ]);

      }
    }
}
