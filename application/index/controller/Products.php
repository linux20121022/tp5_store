<?php
namespace app\index\controller;

class Products
{
    public function index($id)
    {
        var_dump($id);
        return 'index/product';
    }
}
