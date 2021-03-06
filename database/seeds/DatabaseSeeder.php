<?php

use Illuminate\Database\Eloquent\Model;
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
        // $this->call(UserSeeder::class);
        Model::unguard();
       
        $this->call(FlowerShopSeeder::class);
        $this->call(FlowerSeeder::class);
        $this->call(ReviewSeeder::class);
        Model::reguard();
    }
}
