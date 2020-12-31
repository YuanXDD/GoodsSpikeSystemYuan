<?php

/**
 *  登陆页
 * @file   Login.php  
 * @date   2016-8-23 19:52:46 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;

use think\Loader;


class Login extends Common {

    /**
     * 登入
     */
    public function index() {
        
        return $this->fetch();
        
        
    }
    
    /**
     * 处理登录
     */
    public function dologin() {
        //验证密码流程
        // $lists = db('user')->select();
        //dump(request()->post());
        //假设用户名密码争取
        // $this->success('登录成功', '/index');
        $username = input('username');
        $password = input('password');
        
        $dbpassword = db('users')->where('username', $username)->find()['password'];
        $id = db('users')->where('username', $username)->find();
        $rid = db('role_user')->where('uid', $id['id'])->find();
        if($dbpassword == $password) {
            if ($rid['rid'] == 3) {
                $this->error('普通用户无法访问该页面','/login');
            }
            $token = $this->getToken($username);
            cookie("token",$token,time()+LIFETIME);
            cookie("username",$username,time()+LIFETIME);
            $this->success('登录成功','/index');
        } else {
            $this->error('登录失败，请重试','/login');
        }
    }

    /**
     * 登出
     */
    public function logout() {
        cookie("token", null);
        cookie("username", null);
        $this->success('退出成功', 'login/index');
    }

    public function test(){
        echo 'test';
    }

}
