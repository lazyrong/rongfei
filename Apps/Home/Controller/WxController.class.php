<?php
/**
 * @author lazytech.cc
 */
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller{
	
	Public function index() {

		$newsList=D('news')->select();
		$this->assign('newsList',$newsList);
		var_dump($newsList);
		die;
		$this->display('xwrw');
	}
	
}
