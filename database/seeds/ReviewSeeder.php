<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $fake = \Faker\Factory::create();
        $content = ["Ờ mây zing gút chóp em","OK","Bad","so bad","very good"];
        for($i = 0; $i < 100; $i++){

            DB::table('review')->insert([
                'flower_id' => $fake->numberBetween(1, 24),
                'content' => $fake->randomElement($content),
                'user_name' => $fake->randomElement(['hoangbk','hungbk'])
            ]);
        }
    }
}
