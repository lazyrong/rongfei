<?php
/**
 * @author lazytech.cc
 */
namespace Home\Controller;
use Think\Controller;

class NewsController extends Controller{
	
	Public function index() {

		$newsList=M('news')->select();
		$this->assign('newsList',$newsList);
		var_dump($newsList);
		die;
		$this->display('news_edit');
	}
	
}
