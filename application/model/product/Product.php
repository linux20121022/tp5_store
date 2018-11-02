<?php
/**
 * Created by PhpStorm.
 * User: yuhai
 * Date: 2018/10/27
 * Time: 10:14
 */
namespace app\model\product;

use think\Model;
class Product extends Model
{
    protected $table = 'products';

    public function productImages()
    {
        return $this->hasMany('productImages');
    }

    public function productAttributes()
    {
        return $this->hasMany('productAttributes');
    }

    public function productDetail()
    {
        return $this->hasOne('ProductDetail');
    }

    public function user()
    {
        return $this->belongsTo('LikeProducts');
    }
}