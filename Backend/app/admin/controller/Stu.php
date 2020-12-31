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

class Stu extends Common {

    /**
     * 主页面
     */
    public function index() {
        $lists = db('users')->select();
        $cnt1 = 0;
        foreach ($lists as $list) {
            $roles = db('role_user')->where('uid', $list['id'])->find();
            if ($roles['rid'] == 3) {
                $stu[$cnt1] = $list;
                $cnt1++;
            }
        }
        $this->assign("stu", $stu);

        return $this->fetch();
        
    }

}
