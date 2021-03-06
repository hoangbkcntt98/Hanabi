<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Flower extends Model {
    protected $table = "flower";
    /**
     * Find Product By Id
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    protected function findProductById($id) {
        return DB::table('products')->join('brand','products.brand_id','=','brand.id')->where('products.id', $id)->get();
    }

    /**
     * Get all Articles for Product
     * @param $product_id
     */
    protected function getArticlesProduct($product_id){
        return DB::table('articles')->where('product_id', $product_id)->get();
    }

    protected function findAll(){
        return DB::table('flower')->get();
    }
    protected function findAllShop(){
        return DB::table('flower_shop')->get();
    }
    public function scopeSize($query, $request)
    {
        if ($request->has('size')) {
            $query->where('size', $request->size);
        }

        return $query;
    }

    public function scopeCategory($query, $request)
    {
        if ($request->has('category')) {
            $query->where('category', 'like', '%' . $request->category . '%');
        }

        return $query;
    }

    public function scopeRam($query, $request)
    {
        if ($request->has('ram')) {
            $query->where('ram', 'like', '%' . $request->ram . '%');
        }

        return $query;
    }

    public function scopeDisk($query, $request)
    {
        if ($request->has('disk')) {
            $query->where('disk', 'like', '%' . $request->disk . '%');
        }

        return $query;
    }

  
}
