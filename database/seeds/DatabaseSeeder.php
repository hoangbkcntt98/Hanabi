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
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductDetailsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ArticlesSeeder::class);
        Model::reguard();
    }
}