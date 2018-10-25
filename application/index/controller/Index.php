<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return 1;
    }

    public function hello()
    {
        return 222;
    }

    public function data()
    {
        return ['name' => 'thinkphp', 'status' => 1];
    }
}
