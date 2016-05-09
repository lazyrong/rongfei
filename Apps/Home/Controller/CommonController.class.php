<?php

/**
 * 公共类
 * @author lazytech.cc
 */
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller{
	
	//空操作

	public function _empty(){

		$this->redirect(__ROOT__);

	}

}

