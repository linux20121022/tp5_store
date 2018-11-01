<?php
/**
 * Created by PhpStorm.
 * User: yuhai
 * Date: 2018/10/27
 * Time: 10:10
 */
namespace app\services\user;

use app\services\baseService;
use app\model\user\user;
use think\Config;
use think\helper\Hash;

class UserService extends baseService
{
    public static function login($param)
    {
        $param['hash'] = md5($param['password']);
        $user = User::get(function($query) use($param){
            $query->where('name', $param['account']);
            $query->where('password', $param['hash']);
            $query->where('is_active', 0);
        });
        return $user;
    }

    public static function postRegister($param)
    {
        $user = new User();
        $user->name = $param['account'];
        $user->sex = $param['sex'];
        $user->email = $param['email'];
        $user->password = md5($param['password']);
        $user->active_token = self::random(60);
        $user->is_active = 0;
        $user->remember_token = self::random(10);
        $res = $user->save();
        if($res) {

        }
    }

    public static function random($length = 16)
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}