<?php

/**
 *  登陆页
 * @file   
 * @date    
 * @author   
 * @version     
 */

namespace app\admin\controller;

use think\Request;

class User extends Common {
    /**
     * 主页面
     */

     
     
    public function index() {
        $lists = db('users')->select();
        $cnt1 = 0;
        foreach ($lists as $list) {
            $roles = db('role_user')->where('uid', $list['id'])->find();
            if ($roles['rid'] == 1) {
                $super[$cnt1] = $list;
                $cnt1++;
            }
        }
        $this->assign("super", $super);
        
        return $this->fetch();
        
    }

}
