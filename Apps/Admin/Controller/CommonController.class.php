<?php

/**
 * 公共类
 * @author lazytech.cc
 */
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{

	//登录判断
	public function _initialize(){
		if(!isset($_SESSION[C('super_admin')])) {
			$this->redirect('Admin/Login/login');
		}
	}

	//空操作
	public function _empty(){
		$this->redirect("Admin/Index/index");
	}
}

