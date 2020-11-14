<?php

namespace App\Http\Controllers;

use App\Product;
use App\Flower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $user = null;
        if (Auth::check()) {
            $id = Auth::id();
            $user = User::findOrFail($id);
        }
        $product_first = DB::table('flower')->get();
        $product_article = Product::getArticlesProduct($product_first->get(0)->id);
        $list_articles = DB::select(DB::raw("SELECT users.name, tb1.* FROM users INNER JOIN
                                    (SELECT articles.user_id, articles.title, articles.created_at, articles.updated_at FROM articles
                                    INNER JOIN products ON products.id = articles.product_id WHERE products.id = :value ) AS tb1
                                    ON users.id = tb1.user_id"), array("value"=>$product_first->get(0)->id));
        return view('product-details.index', ['products' => $product_first, 'articles' => $product_article, 'list_articles' => $list_articles, 'user' => $user]);
    }

    public function show($id)
    {
        $user = null;
        if (Auth::check()) {
            $id_a = Auth::id();
            $user = User::findOrFail($id_a);
        }
        // $product = Product::findProductById($id);
        $product = DB::table('flower')->join('flower_shop','flower_shop.id','=','flower.flower_shop_id')
        ->select('flower.name','flower_shop.name as flower_shop_name',
        'category','flower.id','flower.image','flower.price','flower_shop.address',
        'flower_shop.phone',
        'flower.count_rates','flower.stars_rate','flower.created_at','size')->where('flower.id',$id)->first();
        $product_article =  DB::table('review')->where('flower_id',$id)->get();
        $list_articles = DB::table('review')->where('flower_id',$id)->get();
//        dd($list_articles);
        return view('product-details.index', ['product' => $product, 'articles' => $product_article, 'list_articles' => $list_articles, 'user' => $user]);
    }


    public function rate(Request $request)
    {
        $data = $request->all();
        $productID = $data['prod_id'];
        $rate = $data['rate'];
        $product = Flower::findOrFail($productID);
        $product->stars_rate = ($product->stars_rate * $product->count_rates + $rate) / ($product->count_rates + 1);
        $product->stars_rate = round($product->stars_rate, 2);
        $product->count_rates = $product->count_rates + 1;
        $product->save();
        return $product;
    }
}
