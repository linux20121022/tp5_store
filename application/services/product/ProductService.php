<?php
/**
 * Created by PhpStorm.
 * User: yuhai
 * Date: 2018/10/27
 * Time: 17:17
 */
namespace app\services\product;

use app\model\product\Category;
use app\model\product\Product;
use app\model\user\User;
use app\services\BaseService;
class ProductService extends BaseService
{
    public static function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    public static function getHotProducts()
    {
        $hot_product = Product::get(['is_hot' => 1]);
        return $hot_product;
    }

    public static function getLatestProducts()
    {
        $latest_product = Product::
        //where('is_hot', '<>', 0)
        where('is_alive', 1)
        ->order('id', 'desc')
        ->limit(25)
        ->select();
        return $latest_product;
    }

    public static function getUser()
    {
       return User::where('is_active', 1)->select();
    }

    public static function getProduct($id)
    {
        $obj = Product::with(['productImages', 'productAttributes'])->findOrFail($id);
        return $obj;
    }
}