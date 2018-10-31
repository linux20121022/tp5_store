<?php
/**
 * Created by PhpStorm.
 * User: yuhai
 * Date: 2018/10/27
 * Time: 10:06
 */
namespace app\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule = [
        'name' => 'required|max:25',
        'password' => 'required'
    ];
}