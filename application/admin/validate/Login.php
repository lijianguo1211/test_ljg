<?php
/**
 * Created by PhpStorm.
 * User: "lijianguo"
 * Date: 2018/6/1
 * Time: 16:03
 */
namespace app\admin\validate;
use think\Validate;

class Login extends Validate
{
    //验证规则
    protected $rule = [
        'logname' => ['require','max'=>12,'min'=>2,'chsDash'],
        'logpass' => ['require','min'=>6,'max'=>18,'alphaDash'],
        'email'   => ['email','require'],
    ];

    //错误返回消息
    protected $message = [
        'logname.require'   => '账户不能为空',
        'logname.max'       => '用户名最多12位',
        'logname.min'       => '用户名最少2位',
        'logname.chsDash'   => '用户名只能是汉字、字母、数字和下划线_及破折号-',
        'logpass.require'   => '密码必须填',
        'logpass.min'       => '密码最少6位',
        'logpass.max'       => '密码最多18位',
        'logpass.alphaDash' => '密码只能是字母和数字，下划线_及破折号-',
        'email.require'     => '必须填写邮箱',
        'email.email'       => '邮箱格式不对',
    ];

    //指定场景
    protected $scene = [
            'login' => [
                'logname',
                'logpass',
            ],
    ];

}