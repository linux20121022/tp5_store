<?php
namespace app\home\controller\product;

class Products
{
    public function index()
    {
        $this->fetch('products/show');
    }
}
