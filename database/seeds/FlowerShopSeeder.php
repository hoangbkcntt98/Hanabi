<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FlowerShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = \Faker\Factory::create();
        $count = 25;
        $name=['HanoiFlower','HCMFlower','ABCFlower','DEFFlower'];
        $address = ['Ha Noi','Ha Tinh','Ha Nam','Nghe An','Thanh Hoa'];
        $phone = [338765522,1231313321,123132155];
        for($i = 0; $i < $count; $i++){

            DB::table('flower_shop')->insert([
                'name' => $fake->randomElement($name),
                'address' => $fake->randomElement($address),
                'phone' => $fake->randomElement($phone),
            ]);
        }

        //
    }
}
