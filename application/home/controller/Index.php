<?php
namespace app\home\controller;

use app\services\product\productService;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $categories = ProductService::getCategories();
        $hotProducts = ProductService::getHotProducts();
        $latestProducts = ProductService::getLatestProducts();
        $users = ProductService::getUser();
        $this->assign('categories', $categories);
        $this->assign('hotProducts', $hotProducts);
        $this->assign('latestProducts', $latestProducts);
        $this->assign('users', $users);
        $this->fetch('home/homes/index');
    }
}
