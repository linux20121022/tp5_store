<?php
/**
 * Created by PhpStorm.
 * User: yuhai
 * Date: 2018/10/27
 * Time: 17:17
 */
namespace app\services\product;

use app\model\product\category;
use app\model\product\product;
use app\model\user\user;
use app\services\baseService;
class productService extends baseService
{
    public static function getCategories()
    {
        $categories = category::all();
        return $categories;
    }

    public static function getHotProducts()
    {
        $hot_product = product::get(['is_hot' => 1]);
        return $hot_product;
    }

    public static function getLatestProducts()
    {
        $latest_product = product::
        //where('is_hot', '<>', 0)
        where('is_alive', 1)
        ->order('id', 'desc')
        ->limit(25)
        ->select();
        return $latest_product;
    }

    public static function getUser()
    {
       return user::where('is_active', 1)->select();
    }
}