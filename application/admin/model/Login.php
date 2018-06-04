<?php
/**
 * Created by PhpStorm.
 * User: "lijianguo"
 * Date: 2018/5/30
 * Time: 16:44
 */
namespace app\admin\model;

use app\admin\model\User;
use think\Model;

class Login extends Model
{
    //验证后台用户登录
    public function checkn($data)
    {
        $msg = [];
        $login_auth = new \app\admin\validate\Login();
        if(!$login_auth->scene('login')->check($data)) {
            $msg = ['status'=>0,'msg'=>$login_auth->getError()];
            return $msg;
        }


        //查数据表
        $user = trim($data['logname']);
        $pass = md5(trim($data['logpass']));
        $user_model = new User();
        $user = $user_model->field('user_name,user_id,user_pwd,user_type')->where('user_name','eq',$user)->find();
        if($user == null) {
            $msg = ['status'=>0,'msg'=>'此用户不存在'];
            return $msg;
        }
        if($user['user_pwd'] != $pass) {
            $msg = ['status'=>0,'msg'=>'用户密码不对'];
            return $msg;
        }
        if($user['user_type'] != 1) {
            $msg = ['status'=>0,'msg'=>'身份不符合要求,禁止访问'];
            return $msg;
        }
        $msg = ['status'=>1,'msg'=>$user];
        return $msg;

    }

    //计入用户登录信息
    public function savelog()
    {
        $data_id = [
            'user_id'=>session('admin_id')
        ];

        $data_log = [
            'user_ip'      => request()->ip(),
            'user_logtime' => time(),
        ];
        $user = new User();
        $user->save($data_log,$data_id);
        return true;
    }
}