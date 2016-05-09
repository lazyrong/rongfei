<?php
namespace Admin\Controller;
use Think\Controller; 

class LoginController extends Controller {
	
	public function login() {
		$this->display('login');
	}

	public function checkLogin() {
		$username = I('username');
		$pwd = I('password','','md5');
		if($pwd == '2a87dbb611198f9e21ec022ff2a6f51c') {
			session('admin','rfadmin');
			$this->redirect('Admin/Index/index');
		} else {
			// 登录失败
			$this->error('用户名或密码错误！');
		}
	}	
	public function logOut() {
		session('[destroy]'); // 销毁session
		$this->_empty();
	}

	//空操作
	public function _empty(){
		$this->redirect("Admin/Index/index");
	}
}