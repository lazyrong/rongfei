<?php
/**
 * @author lazytech.cc
 */
namespace Admin\Controller;
use Think\Controller;

class ListController extends CommonController{
	
	Public function index() {

		$newsList=D('news')->select();
		$this->assign('newsList',$newsList);
		var_dump($newsList);
		die;
		$this->display('xwrw');
	}
	
}
