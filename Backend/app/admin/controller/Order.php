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

class Order extends Common {
    /**
     * 主页面
     */

     
     
    public function index() {
        $lists = db('order_info')->select();
        $this->assign("list", $lists);
        return $this->fetch();
        
    }

}
