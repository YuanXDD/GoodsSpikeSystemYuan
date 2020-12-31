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
use think\Db;

class Index extends Common {

    /**
     * 主页面
     */
    public function index() {
        //查询用户权限名
        // $id = db('users')->where('username', cookie('username'))->find();
        // $rid = db('role_user')->where('uid', $id['id'])->find();
        // $role = db('role')->where('rid', $rid['rid'])->find();
        // $rolename = $role['rolename'];
        // $this->assign('rolename', $rolename);
        // //查询用户功能
        // $pids = db('role_permission')->where('rid', $rid['rid'])->select();
        // $cnt = 0;
        // $permissions = "";
        // foreach ($pids as $pid) {
        //     $permission = db('permission')->where('pid', $pid['pid'])->find();
        //     if($cnt == 1)
        //         $permissions = $permissions . "、";
        //     $permissions = $permissions . $permission['pname'];
            
        //     $cnt = 1;
        // }
        // cookie('role', $rid['rid']);
        // $this->assign('permissions', $permissions);
        // $this->assign('role', $rid['rid']);
        return $this->fetch();
    }

}
