<?php
namespace app\home\controller\product;

use app\services\product\ProductService;
use think\Controller;

class Products extends Controller
{
    public function show($id)
    {
        $product = ProductService::getProduct($id);
        $data = $product->toArray();
        $product_attributes = $data['product_attributes'];
        $attribute = $name = [];
        foreach($product_attributes as $val) {
            $attribute[$val['attribute']][] = $val;
        }
        $this->assign('product', $product);
        $this->assign('attribute', $attribute);
        $this->fetch('home/products/show');
    }
}
