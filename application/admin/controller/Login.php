<?php
/**
 * Created by PhpStorm.
 * User: "lijianguo"
 * Date: 2018/5/30
 * Time: 15:35
 */
namespace app\admin\controller;
use app\admin\model\Login as LoginModel;
use app\admin\controller\Base;
use think\Session;

class Login extends Base
{
    //显示登录
    public function index()
    {
        return $this->fetch();
    }

    //登录提交处理
    public function doLogin()
    {
        //判断是不是post提交
        if(request()->isPost()) {
            $info = request()->param();
            $login = new LoginModel();
            $return = $login->checkn($info);
            if($return['status'] === 0) {
                $this->error($return['msg'],url('login/index','','html'),'','2');
            }
            $admin_return = $return['msg'];
            session('admin_id',$admin_return['user_id']);
            session('admin_user',$admin_return['user_name']);
            $login->savelog('后台登录');
            $this->redirect('admin/index/index');
        } else {
            $msg = ['status'=>1,'msg'=>'请正确登录'];
            $this->error($msg['msg'],url('login/index','','html'),'','2');
            //$this->ajaxReturn(['status'=>1,'msg'=>'请正确登录']);
        }

    }

    //显示忘记密码
    public function forget()
    {
        return $this->fetch();
    }

    //忘记密码处理
    public function doForget()
    {
        //
    }

    //退出登录
    public function logout()
    {
        //消除session值
        //Session::clear('think');
        //Session::delete('admin_id','think');
       // Session::clear();
        session('admin_id',null);
        $this->success("退出成功",url('admin/login/index'));
    }
}