<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

//Route::rule('new/:id','index/Products/index');
Route::get('products/:id','product.Products/show');
//用户
Route::get('user/login','user.Login/index');
Route::post('user/login','user.Login/login');
Route::post('user/logout','user.Login/logout');
Route::get('user/register','user.Login/register');
Route::post('user/register','user.Login/postRegister');
//首页


Route::get('order/index','order.Order/index');
//Route::get('products/','product.Products/index');
//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//
//];
