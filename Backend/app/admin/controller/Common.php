<?php

/**
 * 后台公共文件 
 * @file   Common.php  
 * @date   2016-8-24 18:28:34 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;

use think\Controller;
use think\Db;

define("LIFETIME" , 3600);


class Common extends Controller {

    public function _initialize() {

        $this->username = cookie('username');
        $this->token = cookie('token');
        if(substr(request()->url(),0,13) != "/login/logout"){
            $this->justifyToken($this->username,$this->token);
        }
        
        
        $id = db('users')->where('username', cookie('username'))->find();
        $rid = db('role_user')->where('uid', $id['id'])->find();
        $role = db('role')->where('rid', $rid['rid'])->find();
        $rolename = $role['rolename'];
        $this->assign('rolename', $rolename);
        //查询用户功能
        $pids = db('role_permission')->where('rid', $rid['rid'])->select();
        $cnt = 0;
        $permissions = "";
        foreach ($pids as $pid) {
            $permission = db('permission')->where('pid', $pid['pid'])->find();
            if($cnt == 1)
                $permissions = $permissions . "、";
            $permissions = $permissions . $permission['pname'];
            
            $cnt = 1;
        }
        $this->assign('permissions', $permissions);
        $this->assign('role', $rid['rid']);
    }
    
    private function _addLog() {

        $data = array();
        $data['querystring'] = request()->query()?'?'.request()->query():'';
        $data['m'] = request()->module();
        $data['c'] = request()->controller();
        $data['a'] = request()->action();
        // $data['userid'] = $this->user_id;
        $data['username'] = $this->username;
        $data['ip'] = ip2long(request()->ip());
	    $data['time'] = time();
	   // $arr = array();
        $arr = array('Index/index','Log/index','Menu/index','Log/logDel');
        if (!in_array($data['c'].'/'.$data['a'], $arr)) {
            db('user_log')->insert($data);
        } 
    }
    
    public function justifyToken($username,$token){
        if($this->getToken($username) == $token){
            cookie("token",$token,time()+LIFETIME);
            cookie("username",$username,time()+LIFETIME);
            $this->_addLog();
            
            if(substr(request()->url(),0,6) == "/login"){
                $this->success('已登录','/index');
            }
    
        }else{
            if(substr(request()->url(),0,6) != "/login"){
                $this->error('请登录','/login');
            }
            
        }
    }
    
    public function getToken($username){
        $token = md5(md5($username) . "hgnb2020");
        return $token;
    }
    

}