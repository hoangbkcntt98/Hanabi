<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Flower;
class FlowerSeeder extends Seeder
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
        $name = ['Hoa Cuc','Hoa Hong','Hoa Dao','Hoa Loa Ken','Hoa Moc Lan'];
        $category = ['Bo Hoa','Gio Hoa','Lang Hoa'];
        $image = ['http://localhost:8000/images/products/hoahong1.jpg',
        'http://localhost:8000/images/products/hoahong2.jpg',
        'http://localhost:8000/images/products/hoahong3.jpg',
        'http://localhost:8000/images/products/hoalan1.jpg',
        'http://localhost:8000/images/products/hoalan2.jpg',
        'http://localhost:8000/images/products/hoalan3.jpg',
        'http://localhost:8000/images/products/hoacuc1.jpg',
        'http://localhost:8000/images/products/hoacuc2.jpg',
        'http://localhost:8000/images/products/hoacuc3.jpg'];
        $flower_shop_id =Flower::findAllShop()->pluck('id')->toArray();;
        $price = [''];
        for($i = 0; $i < $count; $i++){

            DB::table('flower')->insert([
                'name' => $fake->randomElement($name),
                'category' => $fake->randomElement($category),
                'image' => $fake->randomElement($image),
                'price' => $fake->numberBetween(1000, 5000),
                'flower_shop_id' => $fake->randomElement($flower_shop_id)
            ]);
        }
      
    }
}
