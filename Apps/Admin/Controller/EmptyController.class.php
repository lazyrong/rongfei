<?php
/**
 * @author lazytech.cc
 */
namespace Admin\Controller;
use Think\Controller;

class EmptyController extends Controller{
    public function index(){
        //空控制器
        $this->error('页面不存在！');
    }
}
