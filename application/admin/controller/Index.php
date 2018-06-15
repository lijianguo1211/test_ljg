<?php
/**
 * Created by PhpStorm.
 * User: "lijianguo"
 * Date: 2018/6/1
 * Time: 17:24
 */
namespace app\admin\controller;
use app\admin\controller\Base;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function test()
    {
        return $this->fetch();
    }
}