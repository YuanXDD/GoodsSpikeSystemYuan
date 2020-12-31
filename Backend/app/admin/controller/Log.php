<?php

/**
 *  
 * @file   LogController.php  
 * @date   2016-10-9 18:23:24 
 * @author Zhenxun Du<5552123@qq.com>  
 * @version    SVN:$Id:$ 
 */

namespace app\admin\controller;

use think\DB;


class Log extends Common {

    public function index() {
        
        $where = array();
        $lists = db("user_log")->where($where)->order('id desc')->limit(20)->select();
        $count = db("user_log")->count();
	
        $this->assign('lists', $lists);
        $this->assign('count', $count);
        return $this->fetch();
    }
    
    public function logDel() {
	    
	    $id = request()->param()['id'];
        Db::table('user_log')->where('id',$id)->delete();
        // dump($id);
        
        $where = array();
        $lists = db("user_log")->where($where)->order('id desc')->limit(20)->select();
        $count = db("user_log")->count();
        $this->assign('lists', $lists);
        $this->assign('count', $count);
        return $this->fetch('index');
    }

}
