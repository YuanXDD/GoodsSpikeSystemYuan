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

class Miaoshagoods extends Common {
    /**
     * 主页面
     */

     
     
    public function index() {
        $lists = db('miaosha_goods')->select();
        $this->assign("list", $lists);
        return $this->fetch();
        
    }

}
