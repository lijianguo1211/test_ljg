<?php
/**
 * Created by PhpStorm.
 * User: "lijianguo"
 * Date: 2018/5/30
 * Time: 16:36
 */
namespace app\admin\controller;
use think\Controller;

class Base extends Controller
{
    //ajax返回消息
    public function ajaxReturn($data,$type="json")
    {
        die(json_encode($data));
    }
}