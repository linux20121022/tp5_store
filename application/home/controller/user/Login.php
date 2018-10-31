<?php

namespace app\home\controller\user;

use think\Controller;
use think\Request;
use think\Session;
use think\Validate;
use app\services\user\userService;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch('user/login');
    }

    public function login(Request $request)
    {
        $chk = $this->checkToken(input('param.__token__'));
        if(!$chk) {
            $this->error('表单校验失败');
        }
        $param = $request->param();
        $user = userService::login($param);
        if($user) {
            cookie('user_id', $user['id']);
            cookie('user_name', $user['name']);
            session('user_id', $user['id']);
            session('user_name', $user['name']);
            $this->success('登录成功', '/index/index');
        } else {
            $this->error('登录失败');
        }
        die();
        var_dump(Session::get());
        var_dump($request->param());
    }

    public function logout(Request $request)
    {
        $chk = $this->checkToken(input('param.__token__'));
        if(!$chk) {
            $this->error('表单校验失败');
        }
        try {
            session('user_id', null);
            session('user_name', null);
            cookie('user_id', null);
            cookie('user_name', null);
            $this->success('注销成功', '/');
        } catch (\Exception $e) {
            $this->error('注销失败', '/');
        }
    }

    function checkToken($token) {
        if ($token == session('__token__')) {
            session('__token__', NULL);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register()
    {
        return $this->fetch('user/register');
    }

    public function postRegister(Request $request)
    {
        $chk = $this->checkToken(input('param.__token__'));
        if(!$chk) {
            $this->error('表单校验失败');
        }
        $param = $request->param();
        userService::postRegister($param);
    }
}
